@extends('user.layouts.app')
@section('title', 'Profile')
@section('content')
    <div class="grid grid-cols-1 gap-4 mx-4">
        <div class="bg-white w-full rounded-lg transition-all duration-300 ease-in-out" data-aos="fade-up" data-aos-duration="1500">
            <div class="flex justify-between">
                <div class="min-h-full w-full">
                    <div class="flex items-center">
                        <div class="bg-[#F3F3F3] flex w-[10%] pb-1 lg:pb-4">
                            <div class="bg-gradient-to-b from-sky-500 to-sky-300 shadow-xl w-[90%] flex items-center justify-center p-5 rounded-s-lg" data-aos="zoom-in" data-aos-duration="1700">
                                <img src="{{ asset('dist/assets/img/profile.svg') }}" alt="" class="w-16">
                            </div>
                        </div>
                        <p class="text-5xl font-semibold text-sky-500 px-12">Profile {{ $user->name ?? '' }}</p>
                    </div>

                    <div class="px-12 pt-5 pb-12">
                        <div class="border-l-4 border-sky-500 pl-6 mt-6">
                            <form class="max-w-1/2 mx-auto">
                                <div class="mb-5">
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama</label>
                                    <input type="text" id="name" name="name" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5" value="{{ $user->name ?? '' }}" />
                                </div>
                                <div class="mb-5">
                                    <label for="nim" class="block mb-2 text-sm font-medium text-gray-900">NIM</label>
                                    <input type="number" id="nim" name="nim" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5" value="{{ $user->nim ?? '' }}" />
                                </div>
                                <div class="mb-5">
                                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                                    <input type="email" id="email" name="email" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5" value="{{ $user->email ?? '' }}" />
                                </div>
                                <div class="mb-5">
                                    <label for="hp" class="block mb-2 text-sm font-medium text-gray-900">No Hp</label>
                                    <input type="number" id="hp" name="hp" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5" value="{{ $user->no_hp ?? '' }}" />
                                </div>
                                <div class="mb-5">
                                    <label for="jenis_kelamin" class="block mb-2 text-sm font-medium text-gray-900">Jenis Kelamin</label>
                                    <div class="flex items-center space-x-4">
                                        <label class="inline-flex items-center">
                                            <input type="radio" name="jenis_kelamin" value="Pria" class="form-radio text-sky-500 focus:ring-sky-500"
                                                {{ $user->jenis_kelamin == 'Pria' ? 'checked' : '' }}>
                                            <span class="ml-2 text-gray-900">Pria</span>
                                        </label>
                                        <label class="inline-flex items-center">
                                            <input type="radio" name="jenis_kelamin" value="Wanita" class="form-radio text-sky-500 focus:ring-sky-500"
                                                {{ $user->jenis_kelamin == 'Wanita' ? 'checked' : '' }}>
                                            <span class="ml-2 text-gray-900">Wanita</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-5">
                                    <label for="address" class="block mb-2 text-sm font-medium text-gray-900">Alamat</label>
                                    <textarea name="address" id="address" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5">
                                        {{ $user->alamat ?? '' }}
                                    </textarea>
                                </div>
                                <div class="mb-5">
                                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Your password</label>
                                    <input type="password" id="password" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5" />
                                </div>
                                <div class="flex justify-end">
                                    <button type="submit" class="text-white bg-sky-500 hover:bg-sky-800 focus:ring-4 focus:outline-none focus:ring-sky-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="bg-[#F3F3F3] min-h-full min-w-2"></div>
                <div class="bg-gradient-to-b from-sky-500 to-sky-300 shadow-xl min-h-full min-w-6 border rounded-e-lg"></div>
            </div>
        </div>
    </div>
@endsection
