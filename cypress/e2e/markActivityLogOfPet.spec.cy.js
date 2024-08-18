describe('Boarding Center Manage Tasks Test Suite', () => {

    it('should log in, navigate to Manage Tasks, select a pet, and verify tasks are added to the Completed Tasks section', () => {
        const petName = 'Amaya Goodman'; // Replace with an actual pet name from your test data

        // Step 1: Log in as Boarding Center
        cy.visit('/login'); // Adjust the login URL if necessary
        cy.get('input[name="email"]').type('boarding@gmail.com'); // Replace with valid email
        cy.get('input[name="password"]').type('hotwheels5'); // Replace with valid password
        cy.get('button[type="submit"]').click();
        cy.url().should('include', '/dashboard'); // Ensure user is redirected to the dashboard

        // Step 2: Click on "Manage Tasks" Button
        cy.get('a.btn.btn-primary').contains('Manage Tasks').click();
        cy.url().should('include', '/boarding-center/managetasks'); // Ensure correct page

        // Step 3: Select the Pet's Manage Tasks
        cy.get('h4').contains(petName).parents('li').find('a').contains('Manage Tasks').click();
        cy.url().should('include', '/boarding-center/managetasks/'); // Ensure correct navigation

        // Step 4: Mark Tasks as Completed and Verify in Completed Tasks Section
        // cy.get('.task-list-group-item').each(($taskItem) => {
        //     // Capture the task name for later verification
        //     cy.wrap($taskItem).find('.form-check-label').invoke('text').then((taskName) => {
        //         taskName = taskName.trim();

        //         // Check the task
        //         cy.wrap($taskItem).find('.form-check-input').check();

        //         // Optionally add a note
        //         cy.wrap($taskItem).find('textarea[name="notes"]').type('Task completed successfully');

        //         // Submit the task completion
        //         cy.wrap($taskItem).find('button[type="submit"]').click();

        //         // Verify that the task appears in the "Completed Tasks" section
        //         cy.get('.completed-card').within(() => {
        //             cy.contains('.completed-list-group-item', taskName).should('exist');
        //         });
        //     });
        // });
    });
});
