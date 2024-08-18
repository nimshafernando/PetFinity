<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Management</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/css/pet_owner_css/nav.css', 'resources/css/pet_owner_css/dashboard.css'])

    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(135deg, #ff6600, #ff9933);
            margin: 0;
            padding: 20px;
            font-family: 'Fredoka', sans-serif;
        }

        .container {
            width: 100%;
            max-width: 900px;
            background-color: #fff; /* White background */
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.15);
            padding: 30px;
            margin: auto;
            text-align: center; /* Centered text */
            overflow-y: auto;
        }

        .fixed-container {
            position: fixed;
            top: 80px;
            right: 20px;
            width: 240px;
            display: flex;
            flex-direction: column;
            gap: 15px;
            z-index: 1000;
        }

        .navigation-button, .btn {
            padding: 12px 20px;
            background-color: #ff6600;
            border: none;
            border-radius: 8px;
            color: #fff;
            text-align: center;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .navigation-button i, .btn i {
            font-size: 20px;
        }

        .navigation-button:hover, .btn:hover {
            background-color: #cc5200;
            transform: translateY(-2px);
        }

        .btn-danger {
            background-color: #d33;
        }

        .btn-danger:hover {
            background-color: #b22;
        }

        .form-section {
            margin-bottom: 20px;
        }

        .form-section h2 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }

        .form-section .field {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-size: 16px;
            margin-bottom: 8px;
            color: #555;
            text-align: center;
        }

        input[type="text"], input[type="number"], select, textarea {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f9f9f9;
            margin-top: 8px;
        }

        .profile-picture-container {
            position: relative;
            width: 180px;
            height: 180px;
            margin: 0 auto 20px;
            border-radius: 50%;
            overflow: hidden;
            background-color: #f0f0f0;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        .profile-picture {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
            cursor: pointer;
        }

        .profile-picture-container:hover .overlay {
            opacity: 1;
        }

        .toggle-switch {
            display: flex;
            align-items: center;
            gap: 10px;
            justify-content: center;
        }

        .toggle-switch label {
            margin-bottom: 0;
            font-size: 16px;
            color: #333;
        }

        .conditional-input {
            margin-top: 20px;
        }

        .flex {
            display: flex;
            gap: 15px;
            align-items: center;
            justify-content: center;
        }

        .flex.items-center {
            align-items: center;
        }

        .flex.justify-end {
            justify-content: center;
        }

        @media (max-width: 768px) {
            .container {
                padding: 20px;
                margin-right: 0;
            }

            .fixed-container {
                position: relative;
                width: 100%;
                top: 0;
                right: 0;
                flex-direction: row;
                justify-content: space-between;
                padding: 10px 0;
                margin-bottom: 20px;
            }

            .navigation-button, .btn {
                width: 48%;
                padding: 10px 0;
            }
        }

        @media (max-width: 576px) {
            .fixed-container {
                flex-direction: column;
                gap: 10px;
            }

            .navigation-button, .btn {
                width: 100%;
                padding: 10px 0;
            }

            .profile-picture-container {
                width: 140px;
                height: 140px;
            }
        }
    </style>
</head>
<body>
    <x-sidebar-nav />

    <div class="fixed-container">
        <div class="navigation-button" onclick="scrollToSection('basicInfo')">
            <i class="fas fa-info-circle"></i> Basic Information
        </div>
        <div class="navigation-button" onclick="scrollToSection('physicalDetails')">
            <i class="fas fa-dumbbell"></i> Physical Details
        </div>
        <div class="navigation-button" onclick="scrollToSection('healthDetails')">
            <i class="fas fa-heartbeat"></i> Health Details
        </div>
        <div class="navigation-button" onclick="scrollToSection('behaviorDetails')">
            <i class="fas fa-paw"></i> Behavior Details
        </div>
        <button type="submit" form="petForm" class="btn">
            <i class="fas fa-save"></i> Save
        </button>
        <form id="deleteForm" method="POST" action="{{ route('pets.delete', $pet->id) }}" style="display:none;">
            @csrf
            @method('DELETE')
        </form>

        <button type="button" onclick="confirmDelete()" class="btn btn-danger">
            <i class="fas fa-trash-alt"></i> Delete
        </button>
    </div>

    <div class="container">
        <form id="petForm" method="POST" enctype="multipart/form-data" action="{{ route('pets.update', $pet->id) }}">
            @csrf
            @method('PUT')

            <!-- Form Fields -->

            <div class="profile-picture-container">
                <img id="profilePicturePreview" src="{{ $pet->profile_picture ? asset('storage/' . $pet->profile_picture) : 'default-image-path' }}" alt="Profile Picture" class="profile-picture">
                <div class="overlay" onclick="document.getElementById('profilePictureInput').click();">
                    <i class="fas fa-plus"></i>
                </div> 
                <input type="file" id="profilePictureInput" name="profile_picture" accept="image/*" style="display: none;" onchange="previewImage(event)">
            </div>
            
            <div class="form-section">
                <label for="pet_name">Pet Name</label>
                <input id="pet_name" value="{{ $pet->pet_name }}" type="text" name="pet_name" placeholder="Enter pet's name" />
            </div>

            <div class="form-section">
                <label for="breed">Breed</label>
                <input id="breed" value="{{ $pet->breed }}" type="text" name="breed" placeholder="Enter pet's breed" />
            </div>

            <div class="form-section">
                <label>Do you know your pet's age?</label>
                <div class="toggle-switch">
                    <input type="radio" name="know_age" id="toggle-no" value="no" {{ $pet->age && !is_numeric($pet->age) ? 'checked' : '' }} onclick="toggleAgeInputs('no')">
                    <label for="toggle-no">No</label>
                    <input type="radio" name="know_age" id="toggle-yes" value="yes" {{ $pet->age && is_numeric($pet->age) ? 'checked' : '' }} onclick="toggleAgeInputs('yes')">
                    <label for="toggle-yes">Yes</label>
                </div>
            </div>

            <div id="input-for-no" class="conditional-input" style="display: none;">
                <label for="estimatedAge">Estimated Age</label>
                <select id="estimatedAge" name="estimated_age">
                    <option value="< 6 months" {{ $pet->age == '< 6 months' ? 'selected' : '' }}> < 6 months </option>
                    <option value="6-12 months" {{ $pet->age == '6-12 months' ? 'selected' : '' }}> 6 - 12 months </option>
                    <option value="1-2 years" {{ $pet->age == '1-2 years' ? 'selected' : '' }}>1 - 2 years</option>
                    <option value="2-4 years" {{ $pet->age == '2-4 years' ? 'selected' : '' }}>2 - 4 years</option>
                    <option value="4-6 years" {{ $pet->age == '4-6 years' ? 'selected' : '' }}>4 - 6 years</option>
                    <option value="6-8 years" {{ $pet->age == '6-8 years' ? 'selected' : '' }}>6 - 8 years</option>
                    <option value="8-10 years" {{ $pet->age == '8-10 years' ? 'selected' : '' }}>8 - 10 years</option>
                    <option value="10-15 years" {{ $pet->age == '10-15 years' ? 'selected' : '' }}>10 - 15 years</option>
                    <option value="> 15 years" {{ $pet->age == '> 15 years' ? 'selected' : '' }}> > 15 years</option>
                </select>
            </div>

            <div id="input-for-yes" class="conditional-input" style="display: none;">
                <label for="age">Exact Age (in years)</label>
                <input type="number" step="0.1" id="age" name="exact_age" value="{{ is_numeric($pet->age) ? $pet->age : '' }}" placeholder="Enter pet's age in years">
            </div>            

            <div class="form-section">
                <label for="isCastrated">Is Castrated</label>
                <select id="isCastrated" name="is_castrated">
                    <option value="not_specified" {{ $pet->is_castrated == 'not_specified' ? 'selected' : '' }}>Not specified</option>
                    <option value="yes" {{ $pet->is_castrated == 'yes' ? 'selected' : '' }}>Yes</option>
                    <option value="no" {{ $pet->is_castrated == 'no' ? 'selected' : '' }}>No</option>
                </select>
            </div>

            <div class="form-section">
                <label for="gender">Gender</label>
                <select id="gender" name="gender">
                    <option value="male" {{ $pet->gender == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ $pet->gender == 'female' ? 'selected' : '' }}>Female</option>
                </select>
            </div>

            <div class="form-section">
                <label for="weight">Weight (in kg)</label>
                <input id="weight" value="{{ $pet->weight }}" type="number" step="0.1" name="weight" placeholder="Enter pet's weight" />
            </div>

            <div class="form-section">
                <label for="height">Height (in cm)</label>
                <input id="height" value="{{ $pet->height }}" type="number" step="0.1" name="height" placeholder="Enter pet's height" />
            </div>

            <div class="form-section">
                <label for="medicalConditions">Medical Conditions</label>
                <div>
                    @foreach(['allergies', 'arthritis', 'diabetes', 'epilepsy', 'heart_disease', 'hip_dysplasia', 'respiratory_issues', 'skin_conditions', 'kidney_disease', 'felv'] as $condition)
                        <label>
                            <input type="checkbox" name="medical_conditions[]" value="{{ $condition }}" {{ in_array($condition, explode(', ', $pet->medical_conditions)) ? 'checked' : '' }}> {{ ucfirst(str_replace('_', ' ', $condition)) }}
                        </label><br>
                    @endforeach
                </div>

                @php
                    $medicalConditionsArray = explode(', ', $pet->medical_conditions);
                    $otherMedicalConditions = array_pop($medicalConditionsArray); // Get the last element
                @endphp

                <div class="form-section">
                    <label for="otherMedicalConditions">Other Medical Conditions</label>
                    <textarea id="medicalConditions" name="other_medical_conditions" rows="3" placeholder="Enter any other medical conditions">{{ $otherMedicalConditions }}</textarea>
                </div>
            </div>

            <div class="form-section">
                <label for="dietaryRestrictions">Dietary Restrictions</label>
                <div>
                    @foreach(['grain_free', 'gluten_free', 'low_fat', 'high_protein', 'no_chicken', 'no_beef', 'hypoallergenic', 'raw_diet', 'vegan'] as $restriction)
                        <label>
                            <input type="checkbox" name="dietary_restrictions[]" value="{{ $restriction }}" {{ in_array($restriction, explode(', ', $pet->dietary_restrictions)) ? 'checked' : '' }}> {{ ucfirst(str_replace('_', ' ', $restriction)) }}
                        </label><br>
                    @endforeach
                </div>

                @php
                $dietary_restrictions = explode(', ', $pet->dietary_restrictions);
                $other_dietary_restrictions = array_pop($dietary_restrictions); // Get the last element
                @endphp

                <div class="form-section">
                    <label for="otherDietaryRestrictions">Other Dietary Restrictions</label>
                    <textarea id="dietaryRestrictions" name="other_dietary_restrictions" rows="3" placeholder="Enter any other dietary restrictions">{{ $other_dietary_restrictions }}</textarea>
                </div>
            </div>

            <div class="form-section">
                <label for="behavioralNotes">Behavioral Notes (optional)</label>
                <div>
                    @foreach(['aggression', 'anxiety', 'fearfulness', 'hyperactivity', 'house_training_issues', 'leash_training', 'separation_anxiety'] as $behavior)
                        <label>
                            <input type="checkbox" name="behavioral_notes[]" value="{{ $behavior }}" {{ in_array($behavior, explode(', ', $pet->behavioral_notes)) ? 'checked' : '' }}> {{ ucfirst(str_replace('_', ' ', $behavior)) }}
                        </label><br>
                    @endforeach
                </div>

                @php
                $behavioral_notes = explode(', ', $pet->behavioral_notes);
                $other_behavioral_notes = array_pop($behavioral_notes); // Get the last element
                @endphp

                <div class="form-section">
                    <label for="otherBehavioralNotes">Other Behavioral Notes</label>
                    <textarea id="behavioralNotes" name="other_behavioral_notes" rows="3" placeholder="Enter any other behavioral notes">{{ $other_behavioral_notes }}</textarea>
                </div>
            </div>

            
        </form>
    </div>

    <script>
        // function for scrolling to a section
        function scrollToSection(sectionId) {
            const section = document.getElementById(sectionId);
            section.scrollIntoView({ behavior: 'smooth' });
        }

        // function to delete a pet
        function confirmDelete() {
            Swal.fire({
                title: `Are you sure you want to delete {{ $pet->pet_name }}?`,
                text: "This action cannot be undone. Please think twice!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, keep my pet',
                customClass: {
                    popup: 'swal2-popup-custom',
                    title: 'swal2-title-custom',
                    confirmButton: 'swal2-confirm-button-custom',
                    cancelButton: 'swal2-cancel-button-custom'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('deleteForm').submit();
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire({
                        title: 'Cancelled',
                        text: `{{ $pet->pet_name }} is safe and sound!`,
                        icon: 'success',
                        customClass: {
                            popup: 'swal2-popup-custom',
                            title: 'swal2-title-custom'
                        }
                    });
                }
            });
        }

        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById('profilePicturePreview');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }

        // Toggle between age inputs based on the selected radio button
        function toggleAgeInputs(option) {
            document.getElementById('input-for-no').style.display = option === 'no' ? '' : 'none';
            document.getElementById('input-for-yes').style.display = option === 'yes' ? '' : 'none';
        }

        // Initialize the state of the inputs on page load
        document.addEventListener('DOMContentLoaded', function() {
            const knowAge = '{{ $pet->age }}';
            if (knowAge && !isNaN(knowAge)) {
                document.getElementById('toggle-yes').checked = true;
                document.getElementById('input-for-yes').style.display = '';
            } else if (knowAge) {
                document.getElementById('toggle-no').checked = true;
                document.getElementById('input-for-no').style.display = '';
            }
        });
    </script>
</body>
</html>

                   
