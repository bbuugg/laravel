<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Section;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
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
            $grid->column('id')->sortable();
            $grid->column('lesson_id');
            $grid->column('chapter_id');
            $grid->column('title');
            $grid->column('content');
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
            $show->field('id');
            $show->field('lesson_id');
            $show->field('chapter_id');
            $show->field('title');
            $show->field('content');
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
}
