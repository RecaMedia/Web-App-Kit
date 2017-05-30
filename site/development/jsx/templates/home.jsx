/*
@category   WebApplicationKit
@package    Web Application Starter Kit
@author     Shannon Reca
@copyright  2017 Shannon Reca
@since      04/18/17
*/

import React from 'react';

import Example from '../components/example';

class Home extends React.Component {

	constructor(props) {
		super(props);
	}

	render() {

		return (
			<div>
				<Example message="React is working!"/>
			</div>
		)
	}
}

export default Home;