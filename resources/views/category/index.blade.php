<x-app-layout>
    <div class="space-y-8">
        <div>
          <x-breadcrumb :page-title="$pageTitle" :breadcrumb-items="$breadcrumbItems" />
        </div>

        {{--Alert start--}}
        @if (session('message'))
        <x-alert :message="session('message')" :type="'success'" />
        @endif
        {{--Alert end--}}

        <div class=" space-y-5">
            <div class="card">
              <header class=" card-header noborder">
                <h4 class="card-title">Advanced Table Two
                </h4>
                <div class="justify-end flex gap-3 items-center flex-wrap">
                    {{-- Create Button start--}}
                    <a class="btn inline-flex justify-center btn-dark rounded-[25px] items-center !p-2 !px-3" href="{{ route('category.create') }}">
                        <iconify-icon icon="ic:round-plus" class="text-lg mr-1">
                        </iconify-icon>
                        {{ __('Adicionar Categoria') }}
                    </a>
                    {{--Refresh Button start--}}
                    <a class="btn inline-flex justify-center btn-dark rounded-[25px] items-center !p-2.5" href="{{ route('category.index') }}">
                        <iconify-icon icon="mdi:refresh" class="text-xl "></iconify-icon>
                    </a>
                </div>
              </header>
              <div class="card-body px-6 pb-6">
                <div class="overflow-x-auto -mx-6 dashcode-data-table">
                  <span class=" col-span-8  hidden"></span>
                  <span class="  col-span-4 hidden"></span>
                  <div class="inline-block min-w-full align-middle">
                    <div class="overflow-hidden ">
                      <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700 data-table">
                        <thead class=" bg-slate-200 dark:bg-slate-700">
                          <tr>
                              <th scope="col" class=" table-th ">
                                ID
                              </th>
                              <th scope="col" class=" table-th ">
                                {{ __('Nome da Categoria') }}
                              </th>
                              <th scope="col" class=" table-th ">
                                {{ __('Slug') }}
                              </th>
                              <th scope="col" class=" table-th ">
                                {{ __('Atualizado') }}
                              </th>
                              <th scope="col" class=" table-th ">
                                Action
                              </th>
                          </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                            @foreach($category as $item)
                            <tr>
                              <td class="table-td">{{ $item['id'] }}</td>
                              <td class="table-td">
                                <span class="flex">
                                  <span class="w-7 h-7 rounded-full ltr:mr-3 rtl:ml-3 flex-none">
                                    <img class="w-full h-full rounded-[100%] object-cover" src="{{ Avatar::create($item->name)->toBase64() }}" alt="image">
                                  </span>
                                  <span class="text-sm text-slate-600 dark:text-slate-300 capitalize">{{ $item['name'] }}</span>
                                </span>
                              </td>
                              <td class="table-td ">{{ $item['slug'] }}</td>
                              <td class="table-td ">
                                <div>
                                {{ $item->updated_at->diffForHumans() }}
                                </div>
                              </td>
                              <td class="table-td ">
                                <div class="flex space-x-3 rtl:space-x-reverse">
                                  <button class="action-btn" type="button">
                                    <iconify-icon icon="heroicons:eye"></iconify-icon>
                                  </button>
                                  <a href="{{ route('category.edit', $item->id) }}" class="action-btn" type="button">
                                    <iconify-icon icon="heroicons:pencil-square"></iconify-icon>
                                  </a>
                                  <form id="deleteForm{{ $item->id }}" method="POST" action="{{ route('category.destroy', $item) }}">
                                  @csrf
                                  @method('DELETE')
                                    <button type="submit" onclick="sweetAlertDelete(event, 'deleteForm{{ $item->id }}')" class="action-btn" type="button">
                                            <iconify-icon icon="heroicons:trash"></iconify-icon>
                                    </button>
                                    </form>
                                </div>
                              </td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>


    @push('scripts')
        <script type="module">
            // data table validation
            $("#data-table, .data-table").DataTable({
                dom: "<'grid grid-cols-12 gap-5 px-6 mt-6'<'col-span-4'l><'col-span-8 flex justify-end'f><'#pagination.flex items-center'>><'min-w-full't><'flex justify-end items-center'p>",
                paging: true,
                ordering: true,
                info: false,
                searching: true,
                lengthChange: true,
                lengthMenu: [10, 25, 50, 100],
                language: {
                    lengthMenu: "Show _MENU_ entries",
                    paginate: {
                        previous: `<iconify-icon icon="ic:round-keyboard-arrow-left"></iconify-icon>`,
                        next: `<iconify-icon icon="ic:round-keyboard-arrow-right"></iconify-icon>`,
                    },
                    search: "Search:",
                },
            });
        </script>
    @endpush
</x-app-layout>