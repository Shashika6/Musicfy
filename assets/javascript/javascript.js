


    

    var Contact = Backbone.Model.extend({
        urlRoot: 'http://localhost/Coursework/index.php/MyRestController/Contacts',
        idAttribute: 'contactID',
        defaults: {
            firstName: '',
            surName: '',
            email: '',
            contactNo: '',
            tags: []
        }
    });

    var UserContacts = Backbone.Collection.extend({
        model: Contact,
        url: 'http://localhost/Coursework/index.php/MyRestController/Contacts'
        
    });

    var userContacts = new UserContacts();

	var contactaddview = Backbone.View.extend(
		{
			el: '#inputarea',
			initialize: function () {
			},
			render: function () {
				return this;
			},
			events: {
				"click #insert": 'addcontact'
			},
			addcontact: function () {
				var contact = new Contact({
					firstName: $('#firstName').val(),
					lastName: $('#lastName').val(),
					email:  $('#email').val(),
					contactNo: $('#contactNo').val(),
					tags:  $('#tags').val()
				});
				contact.save();

			}
		}
	);
	var contactadd = new contactaddview();
    
    






    //var contactallviews = new contactallview();

    
    
    
