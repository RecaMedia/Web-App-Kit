/*
@category   WebApplicationKit
@package    Web Application Starter Kit
@author     Shannon Reca
@copyright  2017 Shannon Reca
@since      04/18/17
*/

const global = function(state = {}, action) {
	state = Object.assign({}, state, {
		lastAction: action.type
	})

	switch (action.type) {

		case "ALERT" : {
			console.log(action.text);
			break;
		}
	}
	return state;
}

export default global;