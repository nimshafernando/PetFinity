class ActivityLogPage {
    verifyPageLoaded() {
        cy.get('.container').should('be.visible');
        cy.contains('Activity Log for').should('be.visible');
    }

    verifyTaskItems() {
        cy.get('.task-item').should('have.length.greaterThan', 0);
    }
}

export default ActivityLogPage;
