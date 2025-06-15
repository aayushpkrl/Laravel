<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-10 sm:px-6 lg:px-8 mx-auto max-w-7xl gap-5" x-data="{ tab: '{{ $tab }}' }">

        <div class="flex space-x-4 mb-6 gap-9">
            <button @click="tab = 'profile'":class="tab === 'profile' ? 'font-bold underline' :  ''">Update Profile Information</button>
            <button @click="tab = 'password'" :class="tab === 'password' ? 'font-bold underline duration-300 scale-70' :  ''">Update Password</button>
            <button @click="tab = 'delete'":class="tab === 'delete' ? 'font-bold underline duration-300 scale-70' :  ''">Delete Account</button>
        </div>

        

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div x-show="tab === 'profile'" x-cloak class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <div x-show="tab === 'password'" x-cloak class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                <div x-show="tab === 'delete'" x-cloak class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        <div>
                            @include('profile.partials.delete-user-form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
