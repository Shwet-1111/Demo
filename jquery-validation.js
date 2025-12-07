jQuery.validator.addMethod(
  "validate_email",
  function (value, element) {
    if (
      /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(
        value
      )
    ) {
      return true;
    } else {
      return false;
    }
  },
  "Enter valid email address"
);

jQuery.validator.addMethod(
  "lettersonlys",
  function (value, element) {
    return this.optional(element) || /^[a-zA-Z ]*$/.test(value);
  },
  "Letters only"
);

jQuery.validator.addMethod(
  "exactlength",
  function (value, element, param) {
    return this.optional(element) || value.length == param;
  },
  $.validator.format("Please enter exactly {0} characters.")
);

jQuery.validator.addMethod(
  "mobile",
  function (value, element) {
    return this.optional(element) || /^[6789]\d{9}$/.test(value);
  },
  "Please enter a valid 10-digit mobile number"
);

$("#ContactForm").validate({
	rules: {
		name: {
			required: true,
			lettersonlys:true
		},
		email: {
			required: true,
			email: true,
			validate_email:true
		},
		mobile: {
			required: true,
			number: true,
			mobile: true,
			maxlength: 10,
		},
		captcha: {
			required: true
		},
			file: {
			required: true
		},
		message: {
			required: true
		},
		
	},
	messages: {
		name: {
			required: "Name is required"
		},
		email: {
			required: "Email is required",
			email: "Enter valid email address"
		},
		mobile: {
			required: "Mobile number is required",
			number: 'Enter valid mobile number',
		},
          file: {
			required: "File is required"
		},
		   captcha: {
			required: "Captcha is required"
		},
          message: {
			required: "Message is required"
		}
	}
});
$("#contact-form").validate({
	rules: {
		contact_name: {
			required: true,
			lettersonlys:true
		},
		contact_email: {
			required: true,
			email: true,
			validate_email:true
		},
		contact_mobile: {
			required: true,
			number: true,
			mobile: true,
			maxlength: 10,
		},
		contact_message: {
			required: true
		}
	},
	messages: {
		contact_name: {
			required: "Name is required"
		},
		contact_email: {
			required: "Email is required",
			email: "Enter valid email address"
		},
		contact_mobile: {
			required: "Mobile number is required",
			number: 'Enter valid mobile number',
		},
          contact_message: {
			required: "Message is required"
		}
	}
});