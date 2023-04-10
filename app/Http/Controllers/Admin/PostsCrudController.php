<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PostsRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Models\Posts;
class PostsCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\Posts::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/posts');
        CRUD::setEntityNameStrings('posts', 'posts');

    }

    protected function setupListOperation()
    {
        $this->crud->addColumn([
            'name' => 'id',
        ]);

        $this->crud->addColumn([
            'name' => 'title',
        ]);

        $this->crud->addColumn([
            'name' => 'content',
        ]);

        $this->crud->addColumn([
            'name' => 'Categories',
        ]);

        $this->crud->addColumn([
            'name' => 'posts_image',
            'type' => 'image',
            'prefix' => 'storage/',
            'height' => '50px',
            'width' => '50px',
        ]);

        $this->crud->addColumn([
            'name' => 'getPostsTags',
            'type' => 'select_multiple',
            'entity' => 'getPostsTags',
            'label' => 'Tags'
        ]);
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(PostsRequest::class);

        $this->crud->addField([
            'name' => 'title',
            'type' => 'text',
            'label' => 'Title',
        ]);
        $this->crud->addField([
            'name' => 'content',
            'type' => 'text',
            'label' => 'Content',
        ]);
        $this->crud->addField([
            'name' => 'categories',
            'type' => 'select2',
            'label' => 'Categories',
        ]);
        $this->crud->addField([
            'name' => 'tags',
            'type' => 'select_multiple',
            'label' => 'Tags',
        ]);
        $this->crud->addField([
            'name' => 'posts_image',
            'type' => 'select_image',
            'label' => 'posts_image',
            'upload' => true
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    public function custom()
    {
        $posts = Posts::get();
        return view('admin', compact('posts'));
    }
}
