<x-app>
    <div class="bg-grey-lighter min-h-screen flex flex-col">
            <div class="container max-w-sm mx-auto flex-1 flex flex-col items-center justify-center px-2">
                <div class="bg-slate-200 px-6 py-8 rounded shadow-md text-black w-full">
                    <h1 class="mb-8 text-3xl font-bold text-center">Créer un compte LocAppPro</h1>
                    <form action="/register" method="POST">
                          @if (session('passwordMessage'))
    <div class="bg-red-500 p-4 rounded-xl">
        {{ session('passwordMessage') }}
    </div>
@endif
                        @csrf
                        <input 
                        type="text"
                        class="block border border-grey-light w-full p-3 rounded mb-4"
                        name="name"
                        placeholder="Nom et Prenom" />
                         <input 
                        type="text"
                        class="block border border-grey-light w-full p-3 rounded mb-4"
                        name="email"
                        placeholder="Email" />

                   

                          <input 
                        type="text"
                        class="block border border-grey-light w-full p-3 rounded mb-4"
                        name="cin"
                        placeholder="CIN" />
                    
                         <select 
                        type="text"
                        class="block border border-grey-light w-full p-3 rounded mb-4"
                        name="role"
                        placeholder="" >
                        <option value="">-----Role-----</option>
                        <option value="client">Client</option>
                        <option value="admin">Admin</option>
                    </select>

                    <input 
                        type="password"
                        class="block border border-grey-light w-full p-3 rounded mb-4"
                        name="password"
                        placeholder="Password" />
                    <input 
                        type="password"
                        class="block border border-grey-light w-full p-3 rounded mb-4"
                        name="confirm_password"
                        placeholder="Confirm Password" />

                    <button
                        type="submit"
                        class="w-full text-center py-3 rounded bg-green-600 text-white hover:bg-green-dark focus:outline-none my-1"
                    >Create Account</button>    
                    </form>

                    <div class="text-center text-sm text-grey-dark mt-4">
                        By signing up, you agree to the 
                        <a class="no-underline border-b border-grey-dark text-grey-dark" href="#">
                            Terms of Service
                        </a> and 
                        <a class="no-underline border-b border-grey-dark text-grey-dark" href="#">
                            Privacy Policy
                        </a>
                    </div>
                </div>

                <div class="text-grey-dark mt-6">
                    Already have an account? 
                    <a class="no-underline border-b border-blue text-blue" href="/login">
                        Log in
                    </a>.
                </div>
            </div>
        </div>
</x-app>