describe('Report Missing Pet Test Suite', () => {

    it('should log in, navigate to Report Missing Pet, fill out the form, submit, and verify on map', () => {
        const petName = 'Maggy Wilder'; // Replace with an actual pet name from your test data

        // Step 1: Log in as Pet Owner
        cy.visit('/login'); // Adjust the login URL if necessary
        cy.get('input[name="email"]').type('owner@gmail.com'); // Replace with valid email
        cy.get('input[name="password"]').type('hotwheels5'); // Replace with valid password
        cy.get('button[type="submit"]').click();
        cy.url().should('include', '/dashboard'); // Ensure user is redirected to the dashboard

        // Step 2: Navigate to the "Report Missing Pet" page
        cy.visit('/missing-pets/create'); // Directly navigate to the report missing pet form
        cy.url().should('include', '/missing-pets/create'); // Ensure correct navigation

        // Step 3: Fill out the form
        cy.get('select[name="pet_id"]').select(petName); // Select pet by name
        cy.get('input[name="last_seen_location"]').type('123 Pet Street, Pet City');
        cy.get('input[name="last_seen_date"]').type('2024-08-18');
        cy.get('input[name="last_seen_time"]').type('14:30');
        cy.get('textarea[name="distinguishing_features"]').type('White fur with black spots, wearing a red collar');
        
        // Step 4: Upload a photo
        const filePath = 'images/dog.jpg'; // Adjust the file path based on your test data
        cy.get('input[name="photo"]').attachFile(filePath);

        // Step 5: Submit the form
        cy.get('button[type="submit"]').click();

        // Step 6: Verify successful submission
        cy.url().should('include', '/missing-pets'); // Ensure user is redirected to the missing pets index
        cy.contains('Your missing pet report has been submitted successfully').should('exist'); // Check for success message

        // Step 7: Navigate to the Missing Pets Map and verify the pet is displayed
        cy.visit('/missing-pets/map'); // Navigate to the missing pets map
        cy.url().should('include', '/missing-pets/map'); // Ensure correct navigation

        // Step 8: Verify the reported pet appears on the map
        cy.contains('.leaflet-marker-icon', petName).should('exist'); // Adjust the selector based on the map's implementation
    });

    it('should log in, navigate to the found reports and submit a found report', () => {
        const missingPetId = 1; // Replace with the actual missing pet ID for the test

        // Step 1: Log in as Pet Owner
        cy.visit('/login'); // Adjust the login URL if necessary
        cy.get('input[name="email"]').type('owner@gmail.com'); // Replace with valid email
        cy.get('input[name="password"]').type('securepassword'); // Replace with valid password
        cy.get('button[type="submit"]').click();
        cy.url().should('include', '/dashboard'); // Ensure user is redirected to the dashboard

        // Step 2: Navigate to the "Create Found Report" page
        cy.visit(`/found-reports/create/${missingPetId}`); // Navigate to the create found report page
        cy.url().should('include', `/found-reports/create/${missingPetId}`); // Ensure correct navigation

        // Step 3: Fill out the found report form
        cy.get('textarea[name="sighting_description"]').type('Spotted the pet near the park, looks healthy.');
        
        // Step 4: Upload a photo of the sighting
        const filePath = 'images/found_pet_photo.jpg'; // Adjust the file path based on your test data
        cy.get('input[name="photo"]').attachFile(filePath);

        // Step 5: Submit the found report
        cy.get('button[type="submit"]').click();

        // Step 6: Verify successful submission
        cy.url().should('include', '/missing-pets'); // Ensure user is redirected to the found reports index
        // cy.contains('Your found report has been submitted successfully').should('exist'); // Check for success message
    });
});
