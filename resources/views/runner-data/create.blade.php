@push('headEndStyles')
<link rel="stylesheet" href="{{ asset('css/ckeditor.css') }}">
@endpush

@push('bodyEndScripts')
<script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script>

<script>
  ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
</script>
@endpush

<x-app-layout>
  <div class="container px-6 mx-auto grid pb-6">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      Runner Data
    </h2>

    <x-session-message :message="session('message')" />

    <!-- New Table -->
    <div class="w-full overflow-hidden rounded-lg shadow-xs" x-data="{selectedType:`{{old('type')}}`}">
      <div class="w-full md:w-1/2 overflow-x-auto">
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
          <form action="{{route('runner-data.store')}}" method="post">
            @csrf

            <label class="block text-sm mt-4">
              <span class="text-gray-700 dark:text-gray-400">
                Runner Name
              </span>
              <x-input type="text" :name="'runner_name'" />
            </label>

            <label class="block mt-4 text-sm">
              <span class="text-gray-700 dark:text-gray-400">
                Radius
              </span>
              <x-input type="number" :name="'radius'" />
            </label>

            {{-- <label class="block mt-4 text-sm">
              <span class="text-gray-700 dark:text-gray-400">
               Start date
              </span>
              <x-input type="date" :name="'start_date'" />
            </label> --}}
            <br/>
            <div
                x-data
                x-init="flatpickr($refs.datetimewidget, {wrap: true, enableTime: true, dateFormat: 'M j, Y h:i K'});"
                x-ref="datetimewidget"
                class="flatpickr container mx-auto col-span-6 sm:col-span-6 mt-5"
            >
            <label for="datetime" class="flex-grow  block font-medium text-sm text-gray-700 mb-1">Start Date</label>
                <div class="flex align-middle align-content-center">
                    <x-input
                        x-ref="datetime"
                        type="text"
                        id="datetime"
                        :name="'start_date'"
                        data-input
                        placeholder="Select.."
                        class="block w-full px-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-l-md shadow-sm"

                    />

                    <a
                        class="h-11 w-10 input-button cursor-pointer rounded-r-md bg-transparent border-gray-300 border-t border-b border-r"
                        title="clear" data-clear
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 mt-2 ml-1" viewBox="0 0 20 20" fill="#c53030">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"/>
                        </svg>
                    </a>
                </div>

            </div>
            <br/>
            <div
            x-data
            x-init="flatpickr($refs.datetimewidget, {wrap: true, enableTime: true, dateFormat: 'M j, Y h:i K'});"
            x-ref="datetimewidget"
            class="flatpickr container mx-auto col-span-6 sm:col-span-6 mt-5"
             >
            <label for="datetime" class="flex-grow  block font-medium text-sm text-gray-700 mb-1">End Date</label>
            <div class="flex align-middle align-content-center">
                <x-input
                    x-ref="datetime"
                    type="text"
                    id="datetime"
                    :name="'end_date'"
                    data-input
                    placeholder="Select.."
                    class="block w-full px-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-l-md shadow-sm"

                />

                <a
                    class="h-11 w-10 input-button cursor-pointer rounded-r-md bg-transparent border-gray-300 border-t border-b border-r"
                    title="clear" data-clear
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 mt-2 ml-1" viewBox="0 0 20 20" fill="#c53030">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"/>
                    </svg>
                </a>
            </div>

            </div>

            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                 Number Of Laps
                </span>
                <x-input type="number" :name="'number_of_laps'" />
            </label>

            <button type="submit"
              class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
              {{ __('Create') }}
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
