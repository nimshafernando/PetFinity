class ReportPage {
    visit() {
      cy.visit('/missing-pets/create'); // Adjust this URL if needed
    }
  
    selectPet(petId) {
      cy.get('#pet_id').select(petId);
    }
  
    fillLastSeenLocation(location) {
      cy.get('#last_seen_location').type(location);
    }
  
    fillLastSeenDate(date) {
      cy.get('#last_seen_date').type(date);
    }
  
    fillLastSeenTime(time) {
      cy.get('#last_seen_time').type(time);
    }
  
    fillDistinguishingFeatures(features) {
      cy.get('#distinguishing_features').type(features);
    }
  
    uploadPhoto(photoPath) {
      cy.get('#photo').attachFile(photoPath);
    }
  
    submitForm() {
      cy.get('button[type="submit"]').click();
    }
  }
  
  export default ReportPage;
  