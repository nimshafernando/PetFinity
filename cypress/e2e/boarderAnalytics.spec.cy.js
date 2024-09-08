describe('Pet Boarder Analytics Test', () => {
    beforeEach(() => {
        cy.visit('/login');
        cy.get('input[name="email"]').type('boarder3@gmail.com');
        cy.get('input[name="password"]').type('aaqilah123');
        cy.get('button[type="submit"]').click();
        cy.url().should('include', '/dashboard');
    });

    it('should navigate to the analytics page, view the data, and return to the dashboard', () => {
        cy.get('a.btn').contains('View Analytics').click();
        cy.url().should('include', '/petboarder/analytics');

        cy.get('.stat-label').contains('Total Bookings').scrollIntoView();
        cy.get('.stat').first().should('be.visible');

        cy.get('.stat-label').contains('Tasks Completed').scrollIntoView();
        cy.get('.stat').eq(1).should('be.visible');

        cy.get('.stat-label').contains('Total Revenue Earned').scrollIntoView();
        cy.get('#monthlyRevenueChart').should('be.visible');

        cy.get('.card-header').contains('Monthly Booking Trends').scrollIntoView();
        cy.get('#monthlyBookingsChart').should('be.visible');

        cy.get('.card-header').contains('Booking Status Distribution').scrollIntoView();
        cy.get('.status-card').should('be.visible');

        cy.get('.card-header').contains('Average Length of Stay').scrollIntoView();
        cy.get('.stat').eq(3).should('be.visible');

        cy.get('.card-header').contains('Total Pets Handled').scrollIntoView();
        cy.get('.pet-card').should('have.length.greaterThan', 0);

        cy.get('.sidebar a').contains('Return to Dashboard').click();
        cy.url().should('include', '/dashboard');
    });
});



