
 var Contact = Backbone.Model.extend({
        urlRoot: 'http://localhost/Coursework/index.php/MyRestController/Contacts',
        idAttribute: 'contactID',
        defaults: {
            contactID: '',
            firstName: '',
            lastName: '',
            email: '',
            contactNo: '',
            tag: '',
            tags: [],
            
        }
    });

    var UserContacts = Backbone.Collection.extend({
        model: Contact,
        url: 'http://localhost/Coursework/index.php/MyRestController/Contacts'
        
    });

    var userContacts = new UserContacts();  

var ContactView = Backbone.View.extend({
     
                model: userContacts,
        tagName: "article",
        className: "contact-container",
        template: $("#contactTemplate").html(),

     events: {
		'click  #edit': 'edit',
		'click  #update': 'update',
		'click #cancel': 'cancel',
		'click #delete': 'delete'
	},
	edit: function() {
            
            console.log("starting to edit");
		$('#edit').hide();
		$('#delete').hide();
		this.$('#update').show();
		this.$('#cancel').show();

		var firstName = this.$('.firstName').html();
                var lastName = this.$('.lastName').html();
		var contactNo = this.$('.contactNo').html();
		var email = this.$('.email').html();
		var tags = this.$('#tags').html();

		this.$('.firstName').html('<input type="text" class="form-control fname-update" value="' + firstName + '">');
                this.$('.lastName').html('<input type="text" class="form-control name-update" value="' + lastName + '">');
		this.$('.contactNo').html('<input type="text" class="form-control telephone-update" value="' + contactNo + '">');
		this.$('.email').html('<input type="text" class="form-control email-update" value="' + email + '">');
		this.$('.tags').html('<input type="text" class="form-control tags-update" value="' + tags + '">');
	},
	update: function() {
    
        
		this.model.set('firstName', $('.fname-update').val());
		this.model.set('contactNo', $('.telephone-update').val());
		this.model.set('email', $('.email-update').val());
		this.model.set('tags', $('.tags-update').val());

		this.model.save(null, {
			success: function(response) {
				console.log('Successfully UPDATED contact with _id: ' + response.toJSON().contactID);
			},
			error: function(err) {
				console.log('Failed to update contact! ID - '+ err.toJSON().contactID);
			}
		});
	},
        
     cancel: function() {
		blogsView.render();
	},
	delete: function() {
		this.model.destroy({
			success: function(response) {
				console.log('Successfully DELETED contact with _id: ' + response.toJSON().contactID);
			},
			error: function(err) {
				console.log('Failed to delete contact!');
			}
		});
	},

        render: function () {
            var tmpl = _.template(this.template);



            $(this.el).html(tmpl(this.model.toJSON()));
            return this;
        }
    });

    //define master view
    var DirectoryView = Backbone.View.extend({
                el: $("#contacts"),
                model: userContacts,
                tagName: "article",
                className: "contact-container",
                template: $("#contactTemplate").html(),
                initialize: function () {
                    var self = this;

                    this.model.on('add', this.render, this);
                    this.model.on('remove', this.render, this);


                    this.model.fetch({
                        success: function (contactResponse) {
                            _.each(contactResponse.toJSON(), function (person) {
                                console.log('Successfully got contacts : '+person.firstName);
                                console.log(person.tag);
                                console.log("//////////////");
                                
                            })

                        },
                        error: function () {
                            console.log("error");
                        }

                    });
                },
         


        render: function () {
            var that = this;
            this.$el.empty();
            _.each(this.model.models, function (item) {
                that.renderContact(item);
            }, this);
        },

        renderContact: function (item) {
            var contactView = new ContactView({
                model: item
            });
            this.$el.append(contactView.render().el);
        }
    });

    //create instance of master view
    var directory = new DirectoryView();
    
