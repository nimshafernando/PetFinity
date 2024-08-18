describe('Activity Log Test Suite', () => {

    it('should log in, navigate to the home page, click on the Show Activity Log button, and view the activity log', () => {
        
        const petName = 'Amaya Goodman';

        // Log in
        cy.visit('/login');
        cy.get('input[name="email"]').type('owner@gmail.com'); 
        cy.get('input[name="password"]').type('hotwheels5'); 
        cy.get('button[type="submit"]').click();
        cy.url().should('include', '/dashboard'); 

        // Navigate to the Activity Log for the specific pet
        cy.contains('h5', `Ongoing Appointment for: ${petName}`).parents('div').find('button').contains('Show Activity Log').click();
        cy.url().should('include', '/activity-log'); 

        // Verify the Activity Log page is displayed
        cy.get('.container .header h2').should('contain', `Activity Log for ${petName}`);

        // Verify the presence of task items in the activity log
        cy.get('.task-log .task-item').should('have.length.at.least', 1); // Ensure at least one task item is present

        // Additional checks for task items
        cy.get('.task-log .task-item').each(($el) => {
            cy.wrap($el).find('.task-name').should('not.be.empty'); // Ensure task name exists
            cy.wrap($el).find('.timestamp').should('not.be.empty'); // Ensure timestamp exists
            cy.wrap($el).find('.task-notes').should('exist'); // If notes are present, they should be visible
        });
    });
});
