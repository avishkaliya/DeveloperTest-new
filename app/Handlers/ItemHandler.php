<?php

namespace App\Handlers;

use App\Models\Item;

class ItemHandler
{
    public function searchItems($searchTerm)
    {
        $itemsQuery = Item::query();

        if (isset($searchTerm)) {
            $itemsQuery->where('code', 'like', "%{$searchTerm}%")
                ->orWhere('name', 'like', "%{$searchTerm}%");
        }

        $items = $itemsQuery->with(['closestCategory'])
            ->orderByDesc('created_at')
            ->paginate(10);

        return $items;
    }
}
