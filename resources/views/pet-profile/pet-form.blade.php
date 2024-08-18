<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Pet</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #ffdfc7;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
            font-weight: bold;
        }
        .image-upload-container {
            position: relative;
            display: inline-block;
            margin: auto;
            left:450px;
        }
        #petAvatar {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #ddd;
        }
        #petPhoto {
            display: none;
        }
        .upload-icon {
            position: absolute;
            bottom: 0;
            right: 0;
            border-radius: 50%;
            padding: 5px;
            cursor: pointer;
        }
        .upload-icon img {
            width: 24px;
            height: 24px;
        }
        label {
            font-weight: bold;
            color: #555;
        }
        input[type="text"],
        input[type="number"],
        input[type="string"],
        select,
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        textarea {
            resize: none;
        }
        input[type="radio"],
        input[type="checkbox"] {
            margin-right: 10px;
        }
        .toggle-switch {
            display: flex;
            align-items: center;
        }
        .toggle-switch label {
            margin-right: 10px;
            cursor: pointer;
        }
        .toggle-switch-background {
            display: none;
        }
        .conditional-input {
            display: none;
        }
        button {
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h1>Let's add your furry friend!</h1>
                <form method="POST" action="{{ route('pet.store') }}" enctype="multipart/form-data">
                    @csrf
                    <!-- Profile Image Section -->
                    <div class="mb-4 text-center image-upload-container">
                        <img src="{{ asset('images/puppyui.png') }}" alt="Pet Avatar" id="petAvatar">
                        <input type="file" id="petPhoto" name="profile_picture" accept="image/*" onchange="previewImage(event)">
                        <label for="petPhoto" class="upload-icon">
                            <img src="{{ asset('images/images.png') }}" alt="Upload Icon">
                        </label>
                    </div>
                    <!-- Pet Name Section -->
                    <div class="form-group">
                        <label for="pet_name">Pet Name</label>
                        <input type="text" id="pet_name" class="form-control" name="pet_name" placeholder="Enter pet's name" required>
                    </div>
                    <!-- Hidden Pet Type -->
                    <input type="hidden" name="type" value="{{ request('type') }}">
                    <!-- Pet Breed Section -->
                    <div class="form-group">
                        <label for="breed">Breed</label>
                        <input type="text" id="breed" class="form-control" name="breed" placeholder="Enter pet's breed" required>
                    </div>
                    <!-- Pet Age Section -->
                    <div class="form-group">
                        <label>Do you know your pet's age?</label>
                        <div class="toggle-switch">
                            <input type="radio" name="know_age" id="toggle-no" value="no" checked>
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
                        <input type="string" step="0.1" class="form-control" id="age" name="exact_age" placeholder="Enter pet's age in years">
                    </div>
                    <!-- Is Castrated Section -->
                    <div class="form-group">
                        <label for="isCastrated">Is Castrated</label>
                        <select id="isCastrated" class="form-control" name="is_castrated" required>
                            <option value="not_specified">Not specified</option>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                    <!-- Gender Section -->
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select id="gender" class="form-control" name="gender" required>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <!-- Weight Section -->
                    <div class="form-group">
                        <label for="weight">Weight (in kg)</label>
                        <input type="number" id="weight" class="form-control" step="0.1" name="weight" placeholder="Enter pet's weight" required>
                    </div>
                    <!-- Height Section -->
                    <div class="form-group">
                        <label for="height">Height (in cm)</label>
                        <input type="number" id="height" class="form-control" step="0.1" name="height" placeholder="Enter pet's height" required>
                    </div>
                    <!-- Medical Conditions Section -->
                    <div class="form-group">
                        <label>Medical Conditions</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="medical_conditions[]" value="allergies">
                            <label class="form-check-label">Allergies</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="medical_conditions[]" value="arthritis">
                            <label class="form-check-label">Arthritis</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="medical_conditions[]" value="diabetes">
                            <label class="form-check-label">Diabetes</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="medical_conditions[]" value="epilepsy">
                            <label class="form-check-label">Epilepsy</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="medical_conditions[]" value="heart_disease">
                            <label class="form-check-label">Heart Disease</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="medical_conditions[]" value="hip_dysplasia">
                            <label class="form-check-label">Hip Dysplasia</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="medical_conditions[]" value="respiratory_issues">
                            <label class="form-check-label">Respiratory Issues</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="medical_conditions[]" value="skin_conditions">
                            <label class="form-check-label">Skin Conditions</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="medical_conditions[]" value="kidney_disease">
                            <label class="form-check-label">Kidney Disease</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="medical_conditions[]" value="felv">
                            <label class="form-check-label">Feline Leukemia Virus (FeLV)</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="otherMedicalConditions">Other Medical Conditions</label>
                        <textarea id="otherMedicalConditions" class="form-control" name="medical_conditions[]" rows="3" placeholder="Enter any other medical conditions"></textarea>
                    </div>
                    <!-- Dietary Restrictions Section -->
                    <div class="form-group">
                        <label>Dietary Restrictions</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="dietary_restrictions[]" value="grain_free">
                            <label class="form-check-label">Grain-Free</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="dietary_restrictions[]" value="gluten_free">
                            <label class="form-check-label">Gluten-Free</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="dietary_restrictions[]" value="low_fat">
                            <label class="form-check-label">Low-Fat</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="dietary_restrictions[]" value="high_protein">
                            <label class="form-check-label">High-Protein</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="dietary_restrictions[]" value="no_chicken">
                            <label class="form-check-label">No Chicken</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="dietary_restrictions[]" value="no_beef">
                            <label class="form-check-label">No Beef</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="dietary_restrictions[]" value="hypoallergenic">
                            <label class="form-check-label">Hypoallergenic</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="dietary_restrictions[]" value="raw_diet">
                            <label class="form-check-label">Raw Diet</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="dietary_restrictions[]" value="vegan">
                            <label class="form-check-label">Vegan</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="otherDietaryRestrictions">Other Dietary Restrictions</label>
                        <textarea id="otherDietaryRestrictions" class="form-control" name="dietary_restrictions[]" rows="3" placeholder="Enter any other dietary restrictions"></textarea>
                    </div>
                    <!-- Behavioral Notes Section -->
                    <div class="form-group">
                        <label>Behavioral Notes (optional)</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="behavioral_notes[]" value="aggression">
                            <label class="form-check-label">Aggression</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="behavioral_notes[]" value="anxiety">
                            <label class="form-check-label">Anxiety</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="behavioral_notes[]" value="fearfulness">
                            <label class="form-check-label">Fearfulness</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="behavioral_notes[]" value="hyperactivity">
                            <label class="form-check-label">Hyperactivity</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="behavioral_notes[]" value="house_training_issues">
                            <label class="form-check-label">House Training Issues</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="behavioral_notes[]" value="leash_training">
                            <label class="form-check-label">Leash Training</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="behavioral_notes[]" value="separation_anxiety">
                            <label class="form-check-label">Separation Anxiety</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="otherBehavioralNotes">Other Behavioral Notes</label>
                        <textarea id="otherBehavioralNotes" class="form-control" name="behavioral_notes[]" rows="3" placeholder="Enter any other behavioral notes"></textarea>
                    </div>
                    <div class="text-center form-group">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>

                    
                </form>
            </div>
        </div>
    </div>
    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function(){
                const output = document.getElementById('petAvatar');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }

        document.addEventListener('DOMContentLoaded', function () {
            const toggleInputs = document.querySelectorAll('.toggle-switch input');
            const inputForNo = document.getElementById('input-for-no');
            const inputForYes = document.getElementById('input-for-yes');

            toggleInputs.forEach(input => {
                input.addEventListener('change', () => {
                    if (input.value === 'yes') {
                        inputForNo.style.display = 'none';
                        inputForYes.style.display = 'block';
                    } else {
                        inputForNo.style.display = 'block';
                        inputForYes.style.display = 'none';
                    }
                });
            });
        });
    </script>
</body>
</html>
