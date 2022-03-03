<div>
    <label class="block text-sm">
        <span class="text-gray-700 dark:text-gray-400">
            Code
        </span>
        <div class="contents" wire:loading.remove>
            <x-input :name="'code'" wire:model="itemCode" readonly type="text" />
        </div>
        <div wire:loading.delay>
            <span>Generating Item Code...</span>
        </div>
    </label>

    <label class="block mt-4 text-sm">
        <span class="text-gray-700 dark:text-gray-400">
            Category
        </span>
        <x-select :name="'category_id'" wire:model.defer="selectedCategoryId" wire:change="onChangeCategory">
            <option value="" selected disabled>--Please Select Category--</option>
            @foreach ($categories as $category)
            <option {{$defaultCategoryId==$category->id?'selected':''}}
                value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </x-select>
    </label>
</div>