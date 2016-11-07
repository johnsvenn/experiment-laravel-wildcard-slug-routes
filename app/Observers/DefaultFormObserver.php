<?php

namespace App\Observers;

use Illuminate\Database\Eloquent\Model as Eloquent;
use App\Blog;
Use App\Page;
Use App\Slug;

class DefaultFormObserver
{
    /**
     * Listen to the model created event.
     *
     * @param  User  $user
     * @return void
     */
    public function created(Eloquent $model)
    {
      
        $r = new \ReflectionClass($model);
        
        $obj = new Slug();
        $obj->slug = $model->slug;
        $obj->controller = $r->getShortName();
        $obj->save();
        
    }

    
}