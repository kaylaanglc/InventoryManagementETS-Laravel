<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- Use 'Edit' for edit mode and create for non-edit/create mode --}}
            {{ isset($items) ? 'Edit Item' : 'Create Item' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- Don't forget to add 'enctype="multipart/form-data"' to accept files in the form --}}
                    <form method="post" action="{{ isset($items) ? route('items.update', $items->id) : route('items.store') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                        @csrf
                        {{-- Add @method('put') for edit mode --}}
                        @isset($items)
                            @method('put')
                        @endisset

                        <div>
                            <!-- Dropdown for Item Type -->
                            <div class="relative">
                                <x-input-label for="item_type" value="Item Type" />
                                <x-select id="item_type" name="item_type" class="mt-1 block w-full">
                                    <option value="" disabled>Select Item Type</option>
                                </x-select>
                            </div>

                            <!-- Dropdown for Item Condition -->
                            <div class="relative mt-6">
                                <x-input-label for="item_condition" value="Item Condition" />
                                <x-select id="item_condition" name="item_condition" class="mt-1 block w-full">
                                    <option value="" disabled>Select Item Condition</option>
                                </x-select>
                            </div>
                        </div>

                        <!-- Desc and Defects -->
                        <div>
                            <x-input-label for="desc" value="Description of Item" />
                            <x-text-input id="desc" name="desc" type="text" class="mt-1 block w-full" :value="$items->desc ?? old('desc')" required />
                            <x-input-error :messages="$errors->get('desc')" />
                        </div>

                        <div>
                            <x-input-label for="defect" value="Item Defects (If Any)" />
                            <x-text-input id="defect" name="defect" type="text" class="mt-1 block w-full" :value="$items->defect ?? old('defect')"/>
                            <x-input-error :messages="$errors->get('defect')" />
                        </div>

                        <!-- Amount -->
                        <div>
                            <x-input-label for="amount" value="Amount of Item(s)" />
                            <x-text-input id="amount" name="amount" type="number" class="mt-1 block w-full" :value="$items->amount ?? old('amount')" required />
                            <x-input-error :messages="$errors->get('amount')" />
                        </div>

                        <!-- Upload Image File -->
                        <div>
                            <x-input-label for="image" value="Upload Image File" />
                            <label class="block mt-2">
                                <span class="sr-only">Choose image</span>
                                <input type="file" id="image" name="image" accept=".jpg, .jpeg, .png" class="block w-full text-sm text-slate-500
                                    file:mr-4 file:py-2 file:px-4
                                    file:rounded-full file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-violet-50 file:text-violet-700
                                    hover:file:bg-violet-100
                                "/>
                            </label>
                            <div class="shrink-0 my-2">
                                <img id="image_preview" class="h-64 w-128 object-cover rounded-md" src="{{ isset($items) ? Storage::url($items->image) : '' }}" alt="Image of Item Preview" />
                            </div>
                            <x-input-error class="mt-2" :messages="$errors->get('image')" />
                        </div>

                        <!-- Submit Button -->
                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Create an onchange event listener for image input
        document.getElementById('image').onchange = function(evt) {
            const [file] = this.files;
            if (file) {
                // If there is an image, create a preview in image_preview
                document.getElementById('image_preview').src = URL.createObjectURL(file);
            }
        }
    </script>

    <script>
        // Fetch Item Type options
        fetch('/item-type-options')
            .then(response => response.json())
            .then(data => {
                const itemTypeDropdown = document.getElementById('item_type');
                data.forEach(option => {
                    const optionElement = document.createElement('option');
                    optionElement.value = option.id;
                    optionElement.textContent = option.item_type;
                    itemTypeDropdown.appendChild(optionElement);
                });
            });

        // Fetch Item Condition options
        fetch('/item-condition-options')
            .then(response => response.json())
            .then(data => {
                const itemConditionDropdown = document.getElementById('item_condition');
                data.forEach(option => {
                    const optionElement = document.createElement('option');
                    optionElement.value = option.id;
                    optionElement.textContent = option.item_condition;
                    itemConditionDropdown.appendChild(optionElement);
                });
            });
    </script>
</x-app-layout>
