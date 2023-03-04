<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\QuestionAnswer;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class QuestionAnswerController extends AdminController
{
    protected $title = '问答';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new QuestionAnswer(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('question_id');
            $grid->column('answer');
            $grid->column('type');
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
        return Show::make($id, new QuestionAnswer(), function (Show $show) {
            $show->field('id');
            $show->field('question_id');
            $show->field('answer');
            $show->field('type');
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
        return Form::make(new QuestionAnswer(), function (Form $form) {
            $form->display('id');
            $form->text('question_id');
            $form->text('answer');
            $form->text('type');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
