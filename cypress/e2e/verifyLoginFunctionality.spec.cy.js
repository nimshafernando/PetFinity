import ReportPage from '../PageObjects/reportPage';

describe('Petfinity Application Test Suite', () => {
  const reportPage = new ReportPage();

  it('should log in successfully, navigate to the Report Missing Pet page, and submit the form', () => {
    // Log in
    cy.visit('/login');
    cy.get('input[name="email"]').type('emily@gmail.com');
    cy.get('input[name="password"]').type('aaqilah123');
    cy.get('button[type="submit"]').click();
    cy.url().should('include', '/dashboard');

    // Navigate to the Report Missing Pet page
    cy.get('.lost-found-card .btn').contains('Report Missing Pet').click();
    cy.url().should('include', '/missing-pets/create');

    // Use the ReportPage object to interact with the form
    reportPage.selectPet('1'); // Adjust '1' to the actual pet ID
    reportPage.fillLastSeenLocation('Central Park');
    reportPage.fillLastSeenDate('2024-08-17');
    reportPage.fillLastSeenTime('14:30');
    reportPage.fillDistinguishingFeatures('White fur with a black spot on the left ear');
    reportPage.uploadPhoto('images/dog.jpg'); // Ensure the file path is correct

    // Submit the form
    reportPage.submitForm();

    // Verify the submission was successful (this could be a redirect or a success message check)
    cy.url().should('include', '/dashboard'); // Assuming it redirects to the list of missing pets
    cy.contains('Missing pet reported successfully').should('be.visible'); // Example success message check
  });
});
