/*
@category   WebApplicationKit
@package    Web Application Starter Kit
@author     Shannon Reca
@copyright  2017 Shannon Reca
@since      04/18/17
*/

const globalDefaults = {};

const globalReducer = function(state = globalDefaults, action) {
	switch (action.type) {
		case "ALERT" : {

			state = Object.assign({}, state, {
				alert: action.payload
			})

			break;
		}
	}
	return state;
}

export default globalReducer;