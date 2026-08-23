<?php

namespace App\Services;

use App\Enums\ProjectEnum;
use App\Helpers\DateHelper;
use App\Models\Activity;
use App\Models\ActivitySection;
use App\Models\ActivityTask;
use App\Models\Tag;
use App\Repositories\ProjectRepository;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Log;

class ActivityService
{

    public function __construct(
        protected ProjectGroupService $projectGroupService,
        protected ProjectRepository $projectRepository
    ) {}

    public function list() {
        $listProjects = $this->projectRepository->getListProject();
        $listGroupProjects = [];

        foreach ($listProjects as $project) {

            Log::info("Project: " . $project);

            if (!isset($listGroupProjects[$project->prg_name])) {
                $listGroupProjects[$project->prg_name] = [];
            }

            $listGroupProjects[$project->prg_name][] = [
                'pro_id' => $project->pro_id,
                'pro_name' => $project->pro_name
            ];
        }

        return $listGroupProjects;
    }

    public function createActivity($data){

        $positionAcvitity = Activity::where('act_sea_id', $data['act_sea_id'])->count('act_position') + 1;

        return Activity::create([
            "act_name" => $data['act_name'],
            "act_description" => $data['act_description'],
            "act_date_start" => Carbon::now(),
            "act_date_end" => Carbon::now(),
            "act_sea_id" => $data['act_sea_id'],
            "act_status" => ProjectEnum::ACTIVE->value,
            "act_position" => $positionAcvitity
        ]);
    }

    public function updateAcitvity(array $data) {
        $this->updateMassiveTasks($data['tasks'], $data['act_id']);
        $this->updateMassiveTags($data['tags'], $data['act_id']);
        return Activity::where('act_id', $data['act_id'])
            ->update([
                'act_name' => $data['act_name'],
                'act_description' => $data['act_description'],
                'act_date_start' => $data['act_date_start'],
                'act_date_end' => $data['act_date_end'],
            ]);
    }

    private function updateMassiveTasks(array $tasks, int $activityId): void
    {
        $currentDate = DateHelper::getCurrentDate();

        DB::transaction(function () use ($tasks, $activityId, $currentDate) {

            ActivityTask::where('ata_act_id', $activityId)->delete();

            $rows = [];

            foreach ($tasks as $task) {
                $rows[] = [
                    'ata_name' => $task['ata_name'],
                    'ata_description' => '',
                    'ata_date' => $currentDate,
                    'ata_act_id' => $activityId,
                    'ata_is_done' => $task['ata_is_done']
                ];
            }

            if (!empty($rows)) {
                ActivityTask::insert($rows);
            }
        });
    }

    private function updateMassiveTags(array $tags, int $activityId): void
    {
        $currentDate = DateHelper::getCurrentDate();

        Log::info("val-tags", [$tags]);
        Log::info("val-activityId", [$activityId]);

        DB::transaction(function () use ($tags, $activityId, $currentDate) {

            // ActivityXTag::where('axt_act_id', $activityId)->delete();

            $rows = [];

            foreach ($tags as $index => $tag) {

                Log::info("val-pivot $index");

                // if ($tag['pivot']) {
                //     $rows[] = [
                //         'axt_tag_id' => $tag['axt_tag_id'],
                //         'axt_act_id' => $activityId,
                //     ];
                // }

            }

            // if (!empty($rows)) {
            //     ActivityXTag::insert($rows);
            // }
        });
    }

    private function createtag($tag){
        Tag::create([
            'tag_name' => $tag["tag_name"],
            'tag_color' => $tag["tag_color"],
            'tag_status' => ProjectEnum::ACTIVE->value
        ]);
    }

    public function createSectionActivity(array $data)
    {
        return ActivitySection::create([
            "acs_name" => $data['acs_name'],
            "acs_pro_id" => $data['acs_pro_id'],
            "acs_status" => ProjectEnum::ACTIVE->value
        ]);
    }

    public function updateActivyBySection(int $sectionId, int $activityId, int $positionActivity){
        return Activity::where('act_id', $activityId)
            ->update(['act_sea_id' => $sectionId, 'act_position' => $positionActivity]);
    }

    public function createTask(array $data) {

        return ActivityTask::create([
            'ata_id' => $data['ata_id'],
            'ata_name' => $data['ata_name'],
            'ata_description' => $data['ata_description'],
            'ata_date' => $data['ata_date'],
            'ata_remind' => $data['ata_remind'],
            'ata_is_done' => $data['ata_is_done'],
            'ata_status' => ProjectEnum::ACTIVE->value,
            'ata_act_id' => $data['ata_act_id']
        ]);
    }

    public function updateTask(array $data){
        return ActivityTask::where('ata_id', $data['ata_id'])
            ->update([
                'ata_name' => $data['ata_name'],
                'ata_is_done' => $data['ata_is_done'],
                'ata_status' => $data['ata_status'],
                'ata_act_id' => $data['ata_act_id']
            ]);
    }
}