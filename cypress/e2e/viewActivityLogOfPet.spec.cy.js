describe('Activity Log Test Suite', () => {

    it('should log in, navigate to the home page, click on the Show Activity Log button, and view the activity log', () => {
        
        const petName = 'coco';

        cy.visit('/login');
        cy.get('input[name="email"]').type('emily@gmail.com'); 
        cy.get('input[name="password"]').type('aaqilah123'); 
        cy.get('button[type="submit"]').click();
        cy.url().should('include', '/dashboard'); 

        cy.contains('h5', `Ongoing Appointment for: ${petName}`).parents('div').find('button').contains('Show Activity Log').click();
        cy.url().should('include', '/activity-log'); 

        cy.get('.container .header h2').should('contain', `Activity Log for ${petName}`);

        cy.get('.task-log .task-item').should('have.length.at.least', 1);

        cy.get('.task-log .task-item').each(($el) => {
            cy.wrap($el).find('.task-name').should('not.be.empty');
            cy.wrap($el).find('.timestamp').should('not.be.empty');
            cy.wrap($el).find('.task-notes').should('exist');
        });
    });
});


