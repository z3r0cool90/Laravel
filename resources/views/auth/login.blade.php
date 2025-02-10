<x-layout>
    <x-slot name="heading">
       Login
    </x-slot>
  
    <form method="POST" action="/login">
        @csrf
  
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
  
                <p class="mt-1 text-sm text-gray-600"></p>
  
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                    <x-form-field>
                        <x-form-label for="email">Email Adress</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="email" id="email" type="email" :value="old('email')" required />
                            <x-form-error name="email" />
                        </div>
                    </x-form-field>
                    <x-form-field>
                        <x-form-label for="password">Password</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="password" id="password" type="password" required />
                            <x-form-error name="password" />
                        </div>
                    </x-form-field>

                </div>
            </div>
  
            <div class="mt-6 flex items-center justify-end gap-x-6">
                <a href="/" class="text-sm font-semibold text-gray-900">Cancel</button>
                <x-form-button>Log in</x-form-button>
            </div>
        </div>
    </form>
  </x-layout>
  