describe('Missing Pets Test Suite', () => {

    it('should log in, view missing pets, select a pet, and report a sighting', () => {
        const email = 'owner@gmail.com';
        const password = 'hotwheels5';
        const missingPetName = 'Amaya Goodman'; 

        // Step 1: Log in
        cy.visit('/login');
        cy.get('input[name="email"]').type(email);
        cy.get('input[name="password"]').type(password);
        cy.get('button[type="submit"]').click();
        cy.url().should('include', '/dashboard'); 

        // Step 2: Click on "View Missing Pets" Button
        cy.get('.lost-found-card').contains('View Missing Pets').parent().find('a.btn').click();
        cy.url().should('include', '/missing-pets'); 

        // Step 3: Select a Specific Missing Pet
        cy.contains('.card-title', missingPetName).parents('.card').within(() => {
            cy.contains('a.btn-primary', 'Report Sighting').click();
        });
        cy.url().should('include', `/found-reports/create`); 

        // Step 4: Enter Details to Report a Sighting
        cy.get('input[name="location"]').type('Central Park');
        cy.get('textarea[name="description"]').type('Spotted near the fountain.');
        cy.get('input[type="file"]').attachFile('images/dog.jpg');

        // Step 5: Submit the Report
        cy.get('button[type="submit"]').click();

        // Step 6: Verify the Sighting Report is Submitted and Displayed
        cy.url().should('not.include', '/found-reports/create');
        // cy.contains('.alert-success', 'Sighting reported successfully').should('be.visible');

        // Verify that the reported sighting is listed under the reported sightings
        cy.contains('Reported Sightings').should('be.visible');
        // cy.contains('.sighting-card', missingPetName).within(() => {
        //     cy.contains('Central Park').should('exist');
        //     cy.contains('Spotted near the fountain.').should('exist');
        //     cy.get('img').should('be.visible'); 
        // });
    });
});
