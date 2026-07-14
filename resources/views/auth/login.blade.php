
<x-guest-layout>

<div class="min-h-screen bg-gradient-to-br from-slate-100 via-blue-50 to-indigo-100 flex items-center justify-center px-4 py-8">

    <div class="w-full max-w-6xl bg-white rounded-3xl shadow-2xl overflow-hidden grid grid-cols-1 lg:grid-cols-2">


        <!-- LEFT PANEL -->
        <div class="relative bg-gradient-to-br from-blue-800 via-blue-700 to-blue-900 text-white p-12 flex flex-col justify-center items-center">


            <!-- Decorative Circles -->
            <div class="absolute top-0 right-0 w-72 h-72 rounded-full bg-white/10"></div>

            <div class="absolute bottom-0 left-0 w-96 h-96 rounded-full bg-white/5"></div>



            <!-- Logo -->
            <img src="{{ asset('images/cams-logo.png') }}"
                 alt="CAMS Logo"
                 class="w-32 mb-6 relative z-10">



            <h1 class="text-4xl font-extrabold tracking-wider relative z-10">
                CAMS
            </h1>



            <p class="text-lg text-blue-100 mt-3 text-center relative z-10">
                Curriculum Approval Management System
            </p>



            <div class="w-20 h-1 bg-cyan-300 rounded-full my-8 relative z-10"></div>



            <p class="text-center text-lg leading-8 max-w-md text-blue-100 relative z-10">
                A streamlined platform for curriculum approval,
                management and academic governance.
            </p>


        </div>




        <!-- RIGHT PANEL -->

        <div class="flex items-center justify-center p-8 md:p-12 bg-white">


            <div class="w-full max-w-md">


                <h2 class="text-4xl font-bold text-slate-800 text-center">
                    Welcome Back
                </h2>


                <p class="text-gray-500 text-center mt-4 text-lg">
                    Login to your CAMS account
                </p>



                <form method="POST" action="{{ route('login') }}" class="mt-10">

                    @csrf



                    <!-- Email -->

                    <div class="mb-6">


                        <label class="block font-semibold text-gray-700 mb-2">
                            Email
                        </label>



                        <div class="relative">


                            <i class="fas fa-envelope absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>


                            <input
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="Enter your email"
                                required
                                autofocus
                                class="w-full h-14 rounded-xl border border-gray-300 pl-12 pr-4 text-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">


                        </div>


                        @error('email')

                        <p class="text-red-500 text-sm mt-2">
                            {{ $message }}
                        </p>

                        @enderror


                    </div>





                    <!-- Password -->

                    <div class="mb-6">


                        <label class="block font-semibold text-gray-700 mb-2">
                            Password
                        </label>



                        <div class="relative">


                            <i class="fas fa-lock absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>



                            <input
                                id="password"
                                type="password"
                                name="password"
                                placeholder="Enter your password"
                                required
                                class="w-full h-14 rounded-xl border border-gray-300 pl-12 pr-12 text-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">




                            <button
                                type="button"
                                onclick="togglePassword()"
                                class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-500 hover:text-blue-600">


                                <i id="eyeIcon" class="fas fa-eye"></i>


                            </button>


                        </div>




                        @error('password')

                        <p class="text-red-500 text-sm mt-2">
                            {{ $message }}
                        </p>

                        @enderror



                    </div>







                    <!-- Remember & Forgot Password -->


                    <div class="flex justify-between items-center mb-8">


                        <label class="flex items-center gap-2">


                            <input
                                type="checkbox"
                                name="remember"
                                class="rounded">


                            <span class="text-gray-600">
                                Remember me
                            </span>


                        </label>




                        @if (Route::has('password.request'))


                        <a href="{{ route('password.request') }}"
                           class="text-blue-600 hover:underline">


                            Forgot Password?


                        </a>


                        @endif


                    </div>






                    <!-- Login Button -->


                    <button
                        type="submit"
                        class="w-full h-14 rounded-xl bg-gradient-to-r from-blue-700 to-indigo-700 hover:from-blue-800 hover:to-indigo-800 text-white text-xl font-semibold shadow-lg transition-all duration-300 hover:scale-[1.01]">


                        Login →


                    </button>



                </form>



            </div>


        </div>


    </div>


</div>





<script>

function togglePassword() {


    const password = document.getElementById('password');

    const eye = document.getElementById('eyeIcon');



    if(password.type === "password"){


        password.type = "text";

        eye.classList.remove("fa-eye");

        eye.classList.add("fa-eye-slash");


    }

    else{


        password.type = "password";

        eye.classList.remove("fa-eye-slash");

        eye.classList.add("fa-eye");


    }


}

</script>



</x-guest-layout>

