<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Management</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap');
        
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(135deg, #ff6600, #ff9933);
            flex-direction: column;
        }
        .container {
            display: flex;
            flex-wrap: wrap;
            width: 90%;
            max-width: 900px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            padding: 20px;
            margin-top: 80px;
            margin-left: 200px; /* Move container to the right */
        }
        .leftSection, .rightSection {
            flex: 1;
            padding: 20px;
        }
        .leftSection {
            border-right: 1px solid #ddd;
        }
        .rightSection {
            display: none;
        }
        .rightSection.active {
            display: block;
            border-left: 1px solid #ddd;
        }
        .petSection h2 {
            font-size: 1.5rem;
            margin-bottom: 20px;
        }
        .petSection ul {
            list-style: none;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        .petSection ul li {
            cursor: pointer;
            transition: transform 0.2s;
        }
        .petSection ul li:hover {
            transform: scale(1.05);
        }
        .petSection ul li img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
        }
        .addContainer {
            text-align: center;
            padding: 20px;
            border: 1px dashed #ddd;
            border-radius: 8px;
            margin-top: 20px;
        }
        .addContainer img {
            width: 100px;
            margin-bottom: 10px;
        }
        .addContainer h1 {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }
        .addContainer p {
            font-size: 1rem;
            color: #555;
            margin-bottom: 10px;
        }
        .top-navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #fff;
            padding: 10px 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 10;
        }

        .top-navbar .logo {
            font-family: 'Fredoka One', cursive;
            font-size: 32px;
            color: #ff6600;
            margin-left: 20px;
        }

        .top-navbar .profile {
            display: flex;
            align-items: center;
            color: #333;
            cursor: pointer;
            font-size: 18px;
            margin-right: 20px;
            font-weight: bold;
        }

        .top-navbar .profile i {
            margin-left: 10px;
            font-size: 24px;
        }

        .sidebar {
            background-color: #fff;
            width: 250px;
            height: calc(100vh - 60px);
            position: fixed;
            top: 58px;
            left: 0;
            padding-top: 30px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            z-index: 10;
            transition: all 0.3s ease-in-out;
            border-radius: 1px;
            font-family: 'Nunito', sans-serif;
        }

        .sidebar h1 {
            font-family: 'Fredoka One', cursive;
            font-size: 32px;
            text-align: center;
            color: #ff6600;
            margin-bottom: 20px;
        }

        .sidebar nav {
            list-style: none;
            padding: 0;
            overflow-y: auto;
            height: calc(100vh - 100px);
            scrollbar-width: none;
            -ms-overflow-style: none;
        }

        .sidebar nav a {
            display: block;
            padding: 15px 20px;
            color: inherit;
            text-decoration: none;
            display: flex;
            align-items: center;
            border-radius: 8px;
            margin: 0 10px;
            font-weight: bold;
            transition: background 0.3s ease-in-out, color 0.3s ease-in-out;
        }

        .sidebar nav a:hover {
            background-color: #ff6600;
            color: #fff;
        }

        .sidebar nav a .nav-icon {
            margin-right: 10px;
            font-size: 20px;
        }

        .navbar {
            display: none;
            background-color: #fff;
            box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
            position: fixed;
            bottom: 0;
            width: 100%;
            z-index: 10;
        }

        .navbar ul {
            list-style: none;
            display: flex;
            justify-content: space-around;
            padding: 0;
            margin: 0;
        }

        .navbar ul li {
            padding: 10px;
        }

        .navbar ul li a {
            text-decoration: none;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            transition: color 0.3s ease-in-out;
        }

        .navbar ul li a:hover {
            color: #ff6600;
        }

        .navbar ul li a i {
            margin-bottom: 5px;
            font-size: 20px;
        }

        @media (max-width: 768px) {
            .sidebar {
                display: none;
            }

            .top-navbar {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 10px 20px;
            }

            .top-navbar .logo {
                font-size: 24px;
                margin-left: 0;
            }

            .top-navbar .profile {
                font-size: 16px;
                margin-right: 0;
            }

            .navbar {
                display: flex;
                justify-content: center;
                position: fixed;
                bottom: 0;
                width: 100%;
                z-index: 20;
            }

            .container {
                flex-direction: column;
                margin-top: 60px;
                margin-left: 3px;
            }

            .leftSection, .rightSection {
                flex: none;
                width: 100%;
            }
        }

        @media (max-width: 480px) {
            .top-navbar .logo {
                font-size: 24px;
                margin-left: 0;
            }

            .top-navbar .profile {
                font-size: 16px;
                margin-right: 0;
            }

            .container {
                margin-top: 60px;
                padding: 10px;
                margin-left: 20px;
            }

            .navbar {
                display: flex;
                justify-content: center;
                position: fixed;
                bottom: 0;
                width: 100%;
                z-index: 20;
            }
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #ff6600;
            color: #fff;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            font-size: 1rem;
        }
        .rightSection .petProfile {
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
        }
        .rightSection form {
            display: flex;
            flex-direction: column;
        }
        .rightSection form .text-center {
            text-align: center;
            margin-bottom: 20px;
        }
        .rightSection form .text-center img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
        }
        .rightSection form .upload-icon {
            cursor: pointer;
            margin-top: 10px;
        }
        .rightSection form .upload-icon img {
            width: 24px;
            height: 24px;
        }
        .rightSection form .mt-4, .rightSection form .mb-4 {
            margin-top: 20px;
            margin-bottom: 20px;
        }
        .rightSection form .block {
            display: block;
            width: 100%;
        }
        .rightSection form input, .rightSection form select, .rightSection form textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
            margin-top: 5px;
        }
        .rightSection form label {
            font-size: 1rem;
            margin-bottom: 5px;
            display: block;
        }
        .rightSection form .toggle-switch {
            display: flex;
            align-items: center;
        }
        .rightSection form .toggle-switch input[type="radio"] {
            display: none;
        }
        .rightSection form .toggle-switch label {
            cursor: pointer;
            padding: 10px 20px;
            background-color: #ddd;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-right: 10px;
        }
        .rightSection form .toggle-switch input[type="radio"]:checked + label {
            background-color: #ff6600;
            color: #fff;
        }
        .rightSection form .conditional-input {
            margin-top: 20px;
            display: none;
        }
        .rightSection form .conditional-input label {
            margin-bottom: 5px;
        }
        .rightSection form .conditional-input select, .rightSection form .conditional-input input {
            width: 100%;
        }
        .flex.items-center.justify-end {
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }
        .ms-4 {
            margin-left: 20px;
        }
    </style>
</head>
<body>

    <div class="top-navbar">
        <div class="logo">Petfinity</div>
        <div class="profile"><span>Profile</span><i class="fas fa-user"></i></div>
    </div>

    <div class="main-container">

        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="p-4">
               
                <nav class="space-y-4">
                    <a href="#" class="nav-link">
                        <div class="nav-icon"><i class="fas fa-home"></i></div>
                        Home
                    </a>

                    <a href="{{ route('mypets') }}" class="nav-link">
                        <div class="nav-icon"><i class="fas fa-paw"></i></div>
                        Pets
                    </a>

                    <a href="{{ route('boarding-centers.index') }}" class="nav-link">
                        <div class="nav-icon"><i class="fas fa-bed"></i></div>
                        Pet Boarding Centers
                    </a>

                    <a href="{{ route('appointments.upcoming') }}" class="nav-link">
                        <div class="nav-icon"><i class="fas fa-calendar-alt"></i></div>
                        Upcoming
                    </a>

                    <a href="{{ route('appointments.history') }}" class="nav-link">
                        <div class="nav-icon"><i class="fas fa-history"></i></div>
                        Past Bookings
                    </a>
                </nav>
            </div>
        </aside>

<div class="container">
    <div class="leftSection">
        <div class="petSection">
            <h2>Your Pets</h2>
            <ul>
                @foreach($pets as $pet)
                    <li data-pet-id="{{ $pet->id }}" onclick="showPetProfile({{ $pet->id }})">
                        <img src="{{ Storage::url($pet->profile_picture) }}" alt="{{ $pet->pet_name }}">
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="addContainer">
            <img src="{{ asset('add-pet.png') }}" alt="Add Pet">
            <h1>Add your pets</h1>
            <p>Manage your pet's profiles easily and keep their information up-to-date.</p>
            <a href="{{ route('pettype') }}" class="btn">Add Pet</a>
            <span>NOTE: You can add multiple pets.</span>
        </div>
    </div>

    <div class="rightSection" id="rightSection">
        <div class="petProfile" id="petProfile">
            <form id="petForm" method="POST" action="" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4 text-center image-upload-container">
                    <img src="{{ asset('images/puppyui.png') }}" alt="Pet Avatar" id="petAvatar">
                    <input type="file" id="petPhoto" name="profile_picture" accept="image/*" onchange="previewImage(event)">
                    <label for="petPhoto" class="upload-icon">
                        <img src="{{ asset('images/images.png') }}" alt="Upload Icon" width="24" height="24">
                    </label>
                </div>

                <div class="mt-4">
                    <label for="pet_name">Pet Name</label>
                    <input id="pet_name" class="block w-full mt-1" type="text" name="pet_name" placeholder="Enter pet's name" required />
                </div>

                <div class="mt-4">
                    <label for="breed">Breed</label>
                    <input id="breed" class="block w-full mt-1" type="text" name="breed" placeholder="Enter pet's breed" required />
                </div>

                <div class="form-group">
                    <label>Do you know your pet's age?</label>
                    <div class="toggle-switch">
                        <input type="radio" name="know_age" id="toggle-no" value="no">
                        <label for="toggle-no">No</label>
                        <input type="radio" name="know_age" id="toggle-yes" value="yes">
                        <label for="toggle-yes">Yes</label>
                    </div>
                </div>

                <div id="input-for-no" class="conditional-input">
                    <label for="estimatedAge">Estimated Age</label>
                    <select class="form-control" id="estimatedAge" name="estimated_age">
                        <option value="< 6 months"> < 6 months </option>
                        <option value="6-12 months"> 6 - 12 months </option>
                        <option value="1-2 years">1 - 2 years</option>
                        <option value="2-4 years">2 - 4 years</option>
                        <option value="4-6 years">4 - 6 years</option>
                        <option value="6-8 years">6 - 8 years</option>
                        <option value="8-10 years">8 - 10 years</option>
                        <option value="10-15 years">10 - 15 years</option>
                        <option value=" > 15 years"> > 15 years</option>
                    </select>
                </div>
    
                <div id="input-for-yes" class="conditional-input" style="display: none;">
                    <label for="age">Exact Age (in years)</label>
                    <input type="number" step="0.1" class="form-control" id="age" name="exact_age" placeholder="Enter pet's age in years">
                </div>

                <div class="mt-4">
                    <label for="isCastrated">Is Castrated</label>
                    <select id="isCastrated" class="block w-full mt-1" name="is_castrated" >
                        <option value="not_specified">Not specified</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div> 
                
                <div class="mt-4">
                    <label for="gender">Gender</label>
                    <select id="gender" class="block w-full mt-1" name="gender" >
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>

                <div class="mt-4">
                    <label for="weight">Weight (in kg)</label>
                    <input id="weight" class="block w-full mt-1" type="number" step="0.1" name="weight" placeholder="Enter pet's weight"  />
                </div>

                <div class="mt-4">
                    <label for="height">Height (in cm)</label>
                    <input id="height" class="block w-full mt-1" type="number" step="0.1" name="height" placeholder="Enter pet's height"  />
                </div>

                <div class="mt-4">
                    <label for="medicalConditions">Medical Conditions</label>
                    <div class="block w-full mt-1">
                        <label>
                            <input type="checkbox" name="medical_conditions[]" value="allergies"> Allergies
                        </label><br>
                        <label>
                            <input type="checkbox" name="medical_conditions[]" value="arthritis"> Arthritis
                        </label><br>
                        <label>
                            <input type="checkbox" name="medical_conditions[]" value="diabetes"> Diabetes
                        </label><br>
                        <label>
                            <input type="checkbox" name="medical_conditions[]" value="epilepsy"> Epilepsy
                        </label><br>
                        <label>
                            <input type="checkbox" name="medical_conditions[]" value="heart_disease"> Heart Disease
                        </label><br>
                        <label>
                            <input type="checkbox" name="medical_conditions[]" value="hip_dysplasia"> Hip Dysplasia
                        </label><br>
                        <label>
                            <input type="checkbox" name="medical_conditions[]" value="respiratory_issues"> Respiratory Issues
                        </label><br>
                        <label>
                            <input type="checkbox" name="medical_conditions[]" value="skin_conditions"> Skin Conditions
                        </label><br>
                        <label>
                            <input type="checkbox" name="medical_conditions[]" value="kidney_disease"> Kidney Disease
                        </label><br>
                        <label>
                            <input type="checkbox" name="medical_conditions[]" value="felv"> Feline Leukemia Virus (FeLV)
                        </label><br>
                    </div>
                
                    <div class="mt-4">
                        <label for="otherMedicalConditions">Other Medical Conditions</label>
                        <textarea id="medicalConditions" class="block w-full mt-1" name="medical_conditions[]" rows="3" placeholder="Enter any other medical conditions"></textarea>
                    </div>
                </div>

                <div class="mt-4">
                    <label for="dietaryRestrictions">Dietary Restrictions</label>
                    <div class="block w-full mt-1">
                        <label>
                            <input type="checkbox" name="dietary_restrictions[]" value="grain_free"> Grain-Free
                        </label><br>
                        <label>
                            <input type="checkbox" name="dietary_restrictions[]" value="gluten_free"> Gluten-Free
                        </label><br>
                        <label>
                            <input type="checkbox" name="dietary_restrictions[]" value="low_fat"> Low-Fat
                        </label><br>
                        <label>
                            <input type="checkbox" name="dietary_restrictions[]" value="high_protein"> High-Protein
                        </label><br>
                        <label>
                            <input type="checkbox" name="dietary_restrictions[]" value="no_chicken"> No Chicken
                        </label><br>
                        <label>
                            <input type="checkbox" name="dietary_restrictions[]" value="no_beef"> No Beef
                        </label><br>
                        <label>
                            <input type="checkbox" name="dietary_restrictions[]" value="hypoallergenic"> Hypoallergenic
                        </label><br>
                        <label>
                            <input type="checkbox" name="dietary_restrictions[]" value="raw_diet"> Raw Diet
                        </label><br>
                        <label>
                            <input type="checkbox" name="dietary_restrictions[]" value="vegan"> Vegan
                        </label><br>
                    </div>
                
                    <div class="mt-4">
                        <label for="otherDietaryRestrictions">Other Dietary Restrictions</label>
                        <textarea id="dietaryRestrictions" class="block w-full mt-1" name="dietary_restrictions[]" rows="3" placeholder="Enter any other dietary restrictions"></textarea>
                    </div>
                </div>

                <div class="mt-4">
                    <label for="behavioralNotes">Behavioral Notes (optional)</label>
                    <div class="block w-full mt-1">
                        <label>
                            <input type="checkbox" name="behavioral_notes[]" value="aggression"> Aggression
                        </label><br>
                        <label>
                            <input type="checkbox" name="behavioral_notes[]" value="anxiety"> Anxiety
                        </label><br>
                        <label>
                            <input type="checkbox" name="behavioral_notes[]" value="fearfulness"> Fearfulness
                        </label><br>
                        <label>
                            <input type="checkbox" name="behavioral_notes[]" value="hyperactivity"> Hyperactivity
                        </label><br>
                        <label>
                            <input type="checkbox" name="behavioral_notes[]" value="house_training_issues"> House Training Issues
                        </label><br>
                        <label>
                            <input type="checkbox" name="behavioral_notes[]" value="leash_training"> Leash Training
                        </label><br>
                        <label>
                            <input type="checkbox" name="behavioral_notes[]" value="separation_anxiety"> Separation Anxiety
                        </label><br>
                    </div>
                
                    <div class="mt-4">
                        <label for="otherBehavioralNotes">Other Behavioral Notes</label>
                        <textarea id="behavioralNotes" class="block w-full mt-1" name="behavioral_notes[]" rows="3" placeholder="Enter any other behavioral notes"></textarea>
                    </div>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <button type="submit" class="btn ms-4">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

    <div class="navbar">
        <ul>
            <li><a href="{{ route('pet-owner.dashboard') }}"><i class="fas fa-home"></i> Home</a></li>
            <li><a href="{{ route('mypets') }}"><i class="fas fa-paw"></i> Pets</a></li>
            <li><a href="{{ route('boarding-centers.index') }}"><i class="fas fa-bed"></i> Boarding</a></li>
            <li><a href="{{ route('appointments.upcoming') }}"><i class="fas fa-calendar-alt"></i> Upcoming</a></li>
            <li><a href="{{ route('appointments.history') }}"><i class="fas fa-history"></i> History</a></li>
        </ul>
    </div>

<script>
function showPetProfile(petId) {
    document.getElementById('rightSection').classList.add('active');

    fetch(`/pets/${petId}`)
        .then(response => response.json())
        .then(data => {
            document.getElementById('petAvatar').src = `{{ Storage::url('${data.profile_picture}') }}`;
            document.getElementById('petForm').action = `/pets/${petId}`;
            document.getElementById('pet_name').value = data.pet_name;
            document.getElementById('breed').value = data.breed;
            document.querySelector(`input[name="know_age"][value="${data.know_age}"]`).checked = true;

            if (data.know_age === 'yes') {
                document.getElementById('input-for-yes').style.display = 'block';
                document.getElementById('input-for-no').style.display = 'none';
                document.getElementById('age').value = data.exact_age;
            } else {
                document.getElementById('input-for-yes').style.display = 'none';
                document.getElementById('input-for-no').style.display = 'block';
                document.getElementById('estimatedAge').value = data.estimated_age;
            }

            document.getElementById('isCastrated').value = data.is_castrated;
            document.getElementById('gender').value = data.gender;
            document.getElementById('weight').value = data.weight;
            document.getElementById('height').value = data.height;

            setCheckboxes('medical_conditions', data.medical_conditions);
            setCheckboxes('dietary_restrictions', data.dietary_restrictions);
            setCheckboxes('behavioral_notes', data.behavioral_notes);
        })
        .catch(error => console.error('Error fetching pet details:', error));
}

function setCheckboxes(name, values) {
    const checkboxes = document.querySelectorAll(`input[name="${name}[]"]`);
    checkboxes.forEach(checkbox => {
        checkbox.checked = values.includes(checkbox.value);
    });
}


    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function(){
            const output = document.getElementById('petAvatar');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }

    document.querySelectorAll('input[name="know_age"]').forEach(input => {
        input.addEventListener('change', function() {
            if (this.value === 'yes') {
                document.getElementById('input-for-yes').style.display = 'block';
                document.getElementById('input-for-no').style.display = 'none';
            } else {
                document.getElementById('input-for-yes').style.display = 'none';
                document.getElementById('input-for-no').style.display = 'block';
            }
        });
    });
</script>

</body>
</html>
