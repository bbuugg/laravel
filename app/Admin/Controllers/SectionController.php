<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Section;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class SectionController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Section(), function (Grid $grid) {
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
        return Show::make($id, new Section(), function (Show $show) {
            $show->field('title');
            $show->html(function () {
                return <<<EOF
<div class="col-sm-8">
$this->content
</div>
EOF;
            });
        });
    }

    protected function card($text, $color = '#fff')
    {
        $text = $this->p(...(is_string($text) ? [$text] : $text));
        return <<<EOF
<div style="background:$color;padding:10px 22px 16px;box-shadow:0 1px 3px 1px rgba(34, 25, 25, 0.1);margin-bottom:8px;">
$text
</div>
EOF;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new Section(), function (Form $form) {
            $form->display('id');
            $form->text('lesson_id');
            $form->text('chapter_id');
            $form->text('title');
            $form->text('content');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }

    public function edit($id, Content $content)
    {
        return $content->title($this->title())
                       ->body(Form::make(new Section(), function (Form $form) {
                           $form->display('id');
                           $form->text('lesson_id');
                           $form->text('chapter_id');
                           $form->text('title');
                           $form->editor('content');

                           $form->display('created_at');
                           $form->display('updated_at');
                       })->edit($id));
    }
}
