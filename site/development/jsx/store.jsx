/*
@category   WebApplicationKit
@package    Web Application Starter Kit
@author     Shannon Reca
@copyright  2017 Shannon Reca
@since      04/18/17
*/

import {combineReducers, createStore} from 'redux';

import GlobalReducer from './reducers/global';

const reducer = combineReducers({
	global: GlobalReducer
});

const store = createStore(reducer);

export default store;