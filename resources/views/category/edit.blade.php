<x-app-layout>
    <div class="space-y-8">
        {{--Breadcrumb start--}}
        <div>
            <x-breadcrumb :page-title="$pageTitle" :breadcrumb-items="$breadcrumbItems" />
        </div>
        {{--Breadcrumb end--}}

        {{--Alert--}}
        @if (session('message') && session('type'))
            <x-alert :message="session('message')" :type="session('type')"/>
        @endif

        <div class="grid xl:grid-cols-2 grid-cols-1 gap-6">
            <div class="card xl:col-span-2">
                <div class="card-body flex flex-col p-6">
                    <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                        <div class="flex-1">
                            <div class="card-title text-slate-900 dark:text-white">{{ __('Editar Categoria') }}</div>
                        </div>
                    </header>
		            <form action="{{ route('category.update', $category->id ) }}" enctype="multipart/form-data" method="POST">
		            @csrf
		            @method('PUT')
                    <div class="card-text h-full ">
                        <form class="space-y-4">
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-7">

                                <div class="input-area relative">
                                    <label class="form-label">{{ __('Nome da Categoria') }}</label>
                                    <input name="name" id="name" type="text" placeholder="Criar uma Pergunta"class="form-control p-[0.565rem] pl-2" value="{{ $category->name }}">
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>

                                <div class="input-area mt-5">
                                    <button class="btn inline-flex justify-center btn-dark">{{ __('Atualizar') }}</button>
                                    <a href="{{ route('category.index') }}" class="btn btn inline-flex justify-center btn-warning light"><span class="flex items-center"><span>{{ __('Voltar') }}</span></span></a>
                                </div>
                        </form>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>