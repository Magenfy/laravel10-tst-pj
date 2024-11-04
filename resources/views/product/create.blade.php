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
            <!-- Basic Inputs -->
            <div class="card">
            <form action="{{ route('products.store') }}" enctype="multipart/form-data" method="POST">
            @csrf  
                <div class="card-body flex flex-col p-6">
                    <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                        <div class="flex-1">
                            <div class="card-title text-slate-900 dark:text-white">{{ __('Criar Produto') }}</div>
                        </div>
                    </header>
                    <div class="card-text h-full space-y-4">
                        <div class="input-area mt-5">
                            <label class="form-label">{{ __('Nome do Produto') }}</label>
                            <input name="name" id="name" type="text" placeholder="Nome do Produto"class="form-control p-[0.565rem] pl-2" value="{{ old('name') }}">
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div class="input-area mt-5">
                            <label class="form-label">{{ __('Preço') }}</label>
                            <input name="price" id="price" type="text" placeholder="Preço do Produto"class="form-control p-[0.565rem] pl-2" value="{{ old('price') }}">
                            <x-input-error :messages="$errors->get('price')" class="mt-2" />
                        </div>

                        <div class="input-area mt-5">
                            <label class="form-label">{{ __('Categoria') }}</label>
                            <input name="category" id="category" type="text" placeholder="Categoria"class="form-control p-[0.565rem] pl-2" value="{{ old('category') }}">
                            <x-input-error :messages="$errors->get('category')" class="mt-2" />
                        </div>

                        <div class="input-area mt-5">
                            <label for="largeInput" class="form-label">{{ __('Descrição Curta') }}</label>
                            <textarea name="description" id="description" class="form-control" placeholder="{{ __('Descrição Curta') }}" value="{{ old('description') }}"></textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2"/>
                            <span class="text-xs font-Inter font-normal text-slate-400 mt-2 inline-block">Digite um texto até 256 caracteres</span>
                        </div>

                        <div class="input-area mt-5">
                            <button class="btn inline-flex justify-center btn-dark">{{ __('Adicionar') }}</button>
                            <a href="{{ route('products.index') }}" class="btn btn inline-flex justify-center btn-warning light"><span class="flex items-center"><span>{{ __('Voltar') }}</span></span></a>
                        </div>
                    </div>
                </div>
            </div>
          <!-- Sized Inputs -->
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-1 gap-6">
                <div class="card">
                    <div class="card-body flex flex-col p-6">
                        <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                            <div class="flex-1">
                                <div class="card-title text-slate-900 dark:text-white">{{ __('Image Produto') }}</div>
                            </div>
                        </header>
                        <div class="card-text h-full space-y-4">
                            <div class="input-area">
                                <label class="form-label">{{ __('URL Image') }}</label>
								<input name="image_url" id="image_url" type="text" placeholder="URL Key Image"class="form-control p-[0.565rem] pl-2" value="{{ old('image_url') }}">
                            	<x-input-error :messages="$errors->get('image_url')" class="mt-2" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
            <!-- end form -->
        </div>

    </div>
</x-app-layout>
