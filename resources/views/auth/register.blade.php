<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>
            <!-- Admission Number -->
            <div>
                <x-label for="admission" :value="__('Admission Number')" />

                <x-input id="admission" class="block mt-1 w-full" type="text" name="admission" :value="old('admission')" required autofocus />
            </div>

             <!-- Level -->
             <div>
                <x-label for="level" :value="__('Level')" />

                <select name="level">
                    <option value="1">Short Course</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7-1">7-1</option>
                    <option value="7-2">7-2</option>
                    <option value="8">8</option>
                </select>
            </div>

             <!-- Course -->
             <div>
                <x-label for="name" :value="__('Course')" />

                <select name="course">
                     @php
                        $courses = DB::select('select * from courses');
                        if(count($courses)>0){
                        
                            foreach ($courses as $key => $value) {
                                # code...
                                $hasData = true;
                            }
                        }else {
                            $hasData = false;
                        }
                    @endphp
                   @if ($hasData)
                       @foreach ($courses as $course)
                           <option value="{{$course->id}}">{{$course->course_name}}</option>
                        
                       @endforeach
                   @endif
                </select>
            </div>
             <div>
                <x-label for="department" :value="__('Departments')" />
                
                <select name="department">
                     @php
                        $departments = DB::select('select * from departments');
                        if(count($departments)>0){
                        
                            foreach ($departments as $key => $value) {
                                # code...
                                $hasData = true;
                            }
                        }else {
                            $hasData = false;
                        }
                    @endphp
                   @if ($hasData)
                       @foreach ($departments as $department)
                           <option value="{{$department->id}}">{{$department->department_name}}</option>
                        
                       @endforeach
                   @endif
                </select>
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Registration Token -->
            {{-- <div class="mt-4">
                <x-label for="token" :value="__('Register Token')" />

                <x-input id="token" class="block mt-1 w-full" type="text" name="token" :value="old('token')" required />
            </div> --}}

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
            <p>Are you Staff? <a href="/register/staff" class="text-blue-500">Staff Registration here</a></p>
        </form>
    </x-auth-card>
</x-guest-layout>
