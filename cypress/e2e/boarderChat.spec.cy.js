describe('Pet Boarder Access Chat from Dashboard', () => {
    it('should log in as a pet boarder, navigate to the dashboard, click the chat button, select the chat with Emily, reply to a message, refresh the page, and verify the conversation', () => {
        cy.visit('/login');
        cy.get('input[name="email"]').type('boarder3@gmail.com');
        cy.get('input[name="password"]').type('aaqilah123');
        cy.get('button[type="submit"]').click();
        cy.url().should('include', '/dashboard');

        cy.get('.card-body a').contains('Start Chatting').click();
        cy.url().should('include', '/pet-boardingcenter/chats');

        cy.get('.chat-sidebar').should('be.visible');
        cy.get('.chat-sidebar a').contains('Emily').click();

        const receivedMessageText = 'Hello The Wagging Tail Inn! How is my pet doing?';
        cy.get('#chatBox').should('be.visible');
        cy.get('#chatBox .message.received').should('contain.text', receivedMessageText);

        const replyText = 'Your pet is doing great! Eating well and playing happily.';
        cy.get('input[name="message"]').type(replyText);
        cy.get('button[type="submit"]').click();

        cy.get('#chatBox').should('be.visible');
        cy.get('#chatBox .message.sent').should('contain.text', replyText);

        cy.wait(1000);

        cy.reload();
        cy.get('.chat-sidebar').should('be.visible');
        cy.get('.chat-sidebar a').contains('Emily').click();

        cy.get('#chatBox').should('be.visible');
        cy.get('#chatBox .message.received').should('contain.text', receivedMessageText);
        cy.get('#chatBox .message.sent').should('contain.text', replyText);
    });
});



