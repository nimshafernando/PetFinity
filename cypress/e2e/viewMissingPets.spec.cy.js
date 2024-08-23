describe('Missing Pets Test Suite', () => {

    it('should log in, view missing pets, select a pet, and report a sighting', () => {
        const email = 'aaqilah@gmail.com';
        const password = 'aaqilah123';
        const missingPetName = 'coco'; 

        cy.visit('/login');
        cy.get('input[name="email"]').type(email);
        cy.get('input[name="password"]').type(password);
        cy.get('button[type="submit"]').click();
        cy.url().should('include', '/dashboard'); 

        cy.get('.lost-found-card').contains('View Missing Pets').parent().find('a.btn').click();
        cy.url().should('include', '/missing-pets'); 

        cy.contains('.card-title', missingPetName).parents('.card').within(() => {
            cy.contains('a.btn-primary', 'Report Sighting').click();
        });
        cy.url().should('include', `/found-reports/create`); 

        cy.get('input[name="location"]').type('Central Park');
        cy.get('textarea[name="description"]').type('Spotted near the fountain.');
        cy.get('input[type="file"]').attachFile('images/dog.jpg');

        cy.get('button[type="submit"]').click();

        cy.url().should('not.include', '/found-reports/create');

        cy.contains('Reported Sightings').should('be.visible');
    });
});


