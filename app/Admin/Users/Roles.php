<?php
namespace App\Admin\Users;
use AdminColumn;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use App\Permit;
use App\Role;
use SleepingOwl\Admin\Contracts\DisplayInterface;
use SleepingOwl\Admin\Contracts\FormInterface;
use SleepingOwl\Admin\Section;
class Roles extends Section
{
    /**
     * @var bool
     */
    protected $checkAccess = false;
    /**
     * @var string
     */
    protected $title;
    /**
     * @var string
     */
    protected $alias;
    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        return AdminDisplay::table()->with('permits')
            ->setHtmlAttribute('class', 'table-primary')
            ->setColumns(
                AdminColumn::text('id', '#')->setWidth('30px'),
                AdminColumn::text('name', 'Name'),
                AdminColumn::text('slug', 'Slug'),
                AdminColumn::text('permits.slug', 'Permits')
            )->paginate(20);
    }
    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
        if(in_array($id, [1, 2, 3, 4]))
        {
            return 'Редактирование этой роли запрещено!';
        } else {
            return AdminForm::panel()->addBody([
                AdminFormElement::text('name', 'Name')->required(),
                AdminFormElement::text('slug', 'Slug')->required(),
                AdminFormElement::multiselect('permits', 'Permits')
                    ->setModelForOptions(Permit::class)
                    ->setDisplay('slug')
            ]);
        }
    }
    /**
     * @return FormInterface
     */
    public function onCreate()
    {
        return $this->onEdit(null);
    }
    /**
     * @return void
     */
    public function onDelete($id)
    {
        // todo: remove if unused
    }
    /**
     * Переопределение метода для запрета удаления записи
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     *
     * @return bool
     */
    public function isDeletable(\Illuminate\Database\Eloquent\Model $model)
    {
        $id = $model->id;
        if (in_array($id, [1, 2, 3, 4]))
        {
            return false;
        } else {
            return 1;
        }
    }
    /**
     * @return void
     */
    public function onRestore($id)
    {
        // todo: remove if unused
    }
}