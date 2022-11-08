<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Chapter;
use App\Models\Lesson;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Show;

class ChapterController extends AdminController
{
    public function index(Content $content)
    {
        return $content->title('章列表')
                       ->body(Grid::make(new Chapter(), function (Grid $grid) {
                           $grid->column('id')->sortable();
                           $grid->column('lesson_id');
                           $grid->column('title');
                           $grid->column('created_at');
                           $grid->column('updated_at')->sortable();

                           $grid->filter(function (Grid\Filter $filter) {
                               $filter->equal('id');

                           });
                       }));
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Chapter(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('lesson_id');
            $grid->column('title');
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');

            });
        });
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
    protected function detail($id)
    {
        return Show::make($id, new Chapter(), function (Show $show) {
            $show->field('id');
            $show->field('lesson_id');
            $show->field('title');
            $show->field('created_at');
            $show->field('updated_at');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $lessonId = \request()->route('lessonId');
        return Form::make(new Chapter(), function (Form $form) use ($lessonId) {
            $form->display('id');
            $form->display('lesson_id')->value($lessonId);
            $form->display('lesson_name')->value(Lesson::find($lessonId)->title);
            $form->text('title');

            $form->display('created_at');
            $form->display('updated_at');
            $form->lesson_id = $lessonId;
        });
    }

    public function edit($id, Content $content)
    {
        /** @var \App\Models\Chapter $chapter */
        $chapter = \App\Models\Chapter::with(['lesson'])->find($id);
        $content->title(sprintf('编辑 %s - %s 章', $chapter->lesson->title, $chapter->title));
        return $content->body(Form::make(new Chapter(), function (Form $form) use ($chapter) {
            $form->display('id');
            $form->display('lesson_name', '课程名称')->value($chapter->lesson->title);
            $form->text('title');

            $form->display('created_at');
            $form->display('updated_at');
            $form->lesson_id = $chapter->lesson->id;
        }));
    }
}
