describe('Boarding Center Manage Tasks Test Suite', () => {

    it('should log in, navigate to Manage Tasks, select a pet, and verify tasks are added to the Completed Tasks section', () => {
        const petName = 'Rhoda Mathews'; 

        // Step 1: Log in as Boarding Center
        cy.visit('/login'); 
        cy.get('input[name="email"]').type('boarder3@gmail.com'); 
        cy.get('input[name="password"]').type('aaqilah123'); 
        cy.get('button[type="submit"]').click();
        cy.url().should('include', '/dashboard');

        // Step 2: Click on "Manage Tasks" Button
        cy.get('a.btn.btn-primary').contains('Manage Tasks').click();
        cy.url().should('include', '/boarding-center/managetasks'); 

        // Step 3: Select the Pet's Manage Tasks
        cy.get('h4').contains(petName).parents('li').find('a').contains('Manage Tasks').click();
        cy.url().should('include', '/boarding-center/managetasks/'); 

    
    });
});

