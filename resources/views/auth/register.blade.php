<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Handsson</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: url('image.png') no-repeat center center/cover;
      background-attachment: fixed;
        }
        .bg-image {
            background-image: url('image.png');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
        .form-container {
            backdrop-filter: blur(10px);
            background-color: rgba(255, 255, 255, 0.85);
        }
        .blue-gradient {
            background: linear-gradient(135deg, #0ea5e9 0%, #1e40af 100%);
        }
        .input-icon {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            left: 1rem;
            color: #94a3b8;
        }
        .form-input {
            transition: all 0.3s ease;
        }
        .form-input:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
        }
        .role-option {
            transition: all 0.2s ease;
        }
        .role-option:hover {
            background-color: #dbeafe;
        }
        .role-option.selected {
            background-color: #bfdbfe;
            border-color: #3b82f6;
        }
        .custom-select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%236b7280'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'%3E%3C/path%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 1em;
        }
    </style>
</head>
<body class="bg-image min-h-screen flex items-center justify-center p-4">
    <div class="container max-w-4xl mx-auto">
        <div class="flex flex-col rounded-2xl shadow-2xl overflow-hidden">
           
            <div class="blue-gradient py-8 px-6 text-white text-center">
                <h1 class="text-3xl font-bold mb-2">Join Handsson</h1>
                <p class="text-blue-100">Create your account and start your journey with us</p>
            </div>
            
            
            <div class="form-container p-6 md:p-10">
                
                <div class="bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-lg mb-6 hidden">
                    <ul class="list-disc list-inside">
                        <li>Error message would appear here</li>
                    </ul>
                </div>
                
                <form action="{{ route('register.submit') }}" method="POST" class="space-y-6">
                    @csrf
                    
                   
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                        <div class="relative">
                            <div class="input-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                            </div>
                            <input type="text" name="name" id="name" class="form-input pl-10 w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none" placeholder="John Doe" required>
                        </div>
                    </div>
                    
                   
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                        <div class="relative">
                            <div class="input-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                    <polyline points="22,6 12,13 2,6"></polyline>
                                </svg>
                            </div>
                            <input type="email" name="email" id="email" class="form-input pl-10 w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none" placeholder="you@example.com" required>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                            <div class="relative">
                                <div class="input-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                    </svg>
                                </div>
                                <input type="password" name="password" id="password" class="form-input pl-10 w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none" placeholder="••••••••" required>
                            </div>
                        </div>
                        
                        
                        <div>
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Confirm Password</label>
                            <div class="relative">
                                <div class="input-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                                    </svg>
                                </div>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-input pl-10 w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none" placeholder="••••••••" required>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div>
                        <label for="role" class="block text-sm font-medium text-gray-700 mb-2">Choose Your Role</label>
                        <div class="relative">
                            <div class="input-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="8.5" cy="7" r="4"></circle>
                                    <line x1="18" y1="8" x2="23" y2="13"></line>
                                    <line x1="23" y1="8" x2="18" y2="13"></line>
                                </svg>
                            </div>
                            <select name="role" id="role" class="custom-select form-input pl-10 w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none">
                                <option value="Owner">Owner</option>
                                <option value="HR">HR</option>
                                <option value="Event Manager">Event Manager</option>
                                <option value="Client" selected>Client</option>
                                <option value="Volunteer">Volunteer</option>
                            </select>
                        </div>
                    </div>
                    
                   
                    <div class="mt-4">
                        <div class="flex flex-wrap -mx-2">
                            <div class="px-2 w-1/2 md:w-1/5 mb-3">
                                <div class="role-option p-4 border rounded-lg text-center cursor-pointer" data-role="Owner">
                                    <div class="w-12 h-12 mx-auto mb-2 rounded-full bg-blue-100 flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#0369a1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M12 2L2 7l10 5 10-5-10-5z"></path>
                                            <path d="M2 17l10 5 10-5"></path>
                                            <path d="M2 12l10 5 10-5"></path>
                                        </svg>
                                    </div>
                                    <span class="text-sm font-medium">Owner</span>
                                </div>
                            </div>
                            <div class="px-2 w-1/2 md:w-1/5 mb-3">
                                <div class="role-option p-4 border rounded-lg text-center cursor-pointer" data-role="HR">
                                    <div class="w-12 h-12 mx-auto mb-2 rounded-full bg-blue-100 flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#0369a1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="9" cy="7" r="4"></circle>
                                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                        </svg>
                                    </div>
                                    <span class="text-sm font-medium">HR</span>
                                </div>
                            </div>
                            <div class="px-2 w-1/2 md:w-1/5 mb-3">
                                <div class="role-option p-4 border rounded-lg text-center cursor-pointer" data-role="Event Manager">
                                    <div class="w-12 h-12 mx-auto mb-2 rounded-full bg-blue-100 flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#0369a1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                            <line x1="16" y1="2" x2="16" y2="6"></line>
                                            <line x1="8" y1="2" x2="8" y2="6"></line>
                                            <line x1="3" y1="10" x2="21" y2="10"></line>
                                        </svg>
                                    </div>
                                    <span class="text-sm font-medium">Event Manager</span>
                                </div>
                            </div>
                            <div class="px-2 w-1/2 md:w-1/5 mb-3">
                                <div class="role-option selected p-4 border rounded-lg text-center cursor-pointer" data-role="Client">
                                    <div class="w-12 h-12 mx-auto mb-2 rounded-full bg-blue-100 flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#0369a1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                    </div>
                                    <span class="text-sm font-medium">Client</span>
                                </div>
                            </div>
                            <div class="px-2 w-1/2 md:w-1/5 mb-3">
                                <div class="role-option p-4 border rounded-lg text-center cursor-pointer" data-role="Volunteer">
                                    <div class="w-12 h-12 mx-auto mb-2 rounded-full bg-blue-100 flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#0369a1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path>
                                        </svg>
                                    </div>
                                    <span class="text-sm font-medium">Volunteer</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="terms" name="terms" type="checkbox" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" required>
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="terms" class="text-gray-500">I agree to the <a href="#" class="text-blue-600 hover:underline">Terms and Conditions</a> and <a href="#" class="text-blue-600 hover:underline">Privacy Policy</a></label>
                        </div>
                    </div>
                    
                    
                    <div>
                        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-4 rounded-lg shadow-md hover:shadow-lg transition duration-300 flex items-center justify-center">
                            <span>Create Account</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ml-2">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                        </button>
                    </div>
                </form>
                
               
                <div class="text-center mt-6">
                    <p class="text-gray-600">Already have an account? <a href="{{ route('login') }}" class="text-blue-600 hover:underline font-medium">Sign in</a></p>
                </div>
            </div>
        </div>
        
       
        <div class="text-center mt-8">
            <h3 class="text-xl font-bold text-white">Handsson</h3>
            <p class="text-white text-opacity-80 mt-1">Your professional solution</p>
        </div>
    </div>
    
    <script>
        
        document.addEventListener('DOMContentLoaded', () => {
            feather.replace();
            
            
            const roleOptions = document.querySelectorAll('.role-option');
            const roleSelect = document.getElementById('role');
            
            roleOptions.forEach(option => {
                option.addEventListener('click', () => {
                    
                    roleOptions.forEach(opt => opt.classList.remove('selected'));
                    
                   
                    option.classList.add('selected');
                    
                  
                    roleSelect.value = option.getAttribute('data-role');
                });
            });
        });
    </script>
</body>
</html>