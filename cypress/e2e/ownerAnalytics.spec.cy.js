describe('Lost and Found Analytics', () => {
    beforeEach(() => {
        cy.visit('/login');
        cy.get('input[name="email"]').type('emily@gmail.com');
        cy.get('input[name="password"]').type('aaqilah123');
        cy.get('button[type="submit"]').click();
        cy.url().should('include', '/dashboard');
    });

    it('should visit the lost and found analytics page, view the data, and return to the dashboard', () => {
        cy.visit('petowner/lost-and-found-analytics');

        cy.get('h5').contains('Pets Reported Missing Over Time').scrollIntoView();
        cy.get('#missingPetsGraph').should('be.visible');
        cy.get('h5').contains('Sightings Over Time').scrollIntoView();
        cy.get('#sightingsGraph').should('be.visible');
        
        cy.get('.card-header').contains('Missing Pets Details').scrollIntoView();
        cy.get('.card-body table').should('be.visible');
        
        cy.get('.back-button').should('be.visible').click();
        cy.url().should('include', '/dashboard');
    });
});


