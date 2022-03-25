<?php

namespace App\Traits;

trait Searchable 
{
    /**
     * @param \Illuminate\Database\Eloquent\Builder  $query
     * @param string  $searchString
     * @param boolean $exact search all words seperately or search for exact searchString
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearch ($query, $searchString, $exact = false)
    {
        $query->where(function ($query) use ($searchString, $exact) {
            
            foreach ($this->searchableColumns as $column) {
                
                if ($exact) {
                    
                    $query->orWhere($column, 'like', '%'.$searchString.'%');
                
                } else {
                    
                    $values = $this->spaceDelimitedArray($searchString);

                    foreach ($values as $value) {
                        
                        $query->orWhere($column, 'like', '%'.$value.'%');
                    }
                }
            }
        });
    }

    
    /**
     * Make array with unique, space delimited values of string
     *
     * @param  string $string
     * @return Array
     */
    protected function spaceDelimitedArray($string)
    {
        return array_unique(preg_split('/\s+/', $string));
    }
}