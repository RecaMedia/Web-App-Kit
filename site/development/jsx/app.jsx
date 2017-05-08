/*
@category   WebApplicationKit
@package    Web Application Starter Kit
@author     Shannon Reca
@copyright  2017 Shannon Reca
@since      04/18/17
*/

import React from 'react';
import ReactDOM from 'react-dom';
import {Provider} from 'react-redux';
import store from './store';

import Example from './components/example';
import Example2 from './components/example2';

class App extends React.Component {

	render() {

		return (
			<div>
				<Example message="React is working!"/>
				<br/>
				<Example2 message="Second React is working!"/>
			</div>
		)
	}
}

ReactDOM.render(
	<Provider store={store}>
		<App/>
	</Provider>, document.querySelector("#App")
);