<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Lesson;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Show;

class LessonController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Lesson(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('title', '标题');
            $grid->column('mode', '模式');
            $grid->column('created_at', '创建时间')->sortable();
            $grid->column('updated_at', '更新时间')->sortable();

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
        return Show::make($id, new Lesson(), function (Show $show) {
            $show->field('id');
            $show->field('title');
            $show->field('mode');
            $show->field('created_at', '创建时间');
            $show->field('updated_at', '更新时间');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new Lesson(), function (Form $form) {
            $form->display('id');
            $form->text('title', '标题');
            $form->select('mode', '模式')->options(['章节', '节']);
            $form->display('created_at', '创建时间');
            $form->display('updated_at', '更新时间');
        });
    }

    public function edit($id, Content $content)
    {
        return $content->title('编辑')
                       ->body(Form::make(new Lesson(), function (Form $form) use ($id) {
                           $form->title($this->title());
                           $form->display('id');
                           $form->text('title', '标题');
                           $form->select('mode', '模式')->options(['章节', '节']);
                           $form->display('created_at', '创建时间');
                           $form->display('updated_at', '更新时间');
                           $form->tools(function (Form\Tools $tools) use ($id) {
                               $url = route('dcat.admin.chapter.index', ['lessonId' => $id]);
                               $tools->append("<a class='btn btn-sm btn-primary mallto-next' href='{$url}'>章列表</a> &nbsp;");
                           });
                       })->edit($id));
    }
}
