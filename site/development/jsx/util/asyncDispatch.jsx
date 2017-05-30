/*
@category   WebApplicationKit
@package    Web Application Starter Kit
@author     Shannon Reca
@copyright  2017 Shannon Reca
@since      04/18/17
*/

// asyncDispatchMiddleware by Marcelo Lazaroni - https://lazamar.github.io/dispatching-from-inside-of-reducers/
const asyncDispatchMiddleware = store => next => action => {
  let syncActivityFinished = false;
  let actionQueue = [];

  function flushQueue() {
    actionQueue.forEach(a => {
      store.dispatch(a);
    }); // flush queue
    actionQueue = [];
  }

  function asyncDispatch(asyncAction) {
    actionQueue = actionQueue.concat([asyncAction]);

    if (syncActivityFinished) {
      flushQueue();
    }
  }

  // Minor modification - SR
  var new_action;
  if (action === undefined) {
    new_action = {
      type: "ASYNC",
      asyncDispatch
    }
  } else {
    new_action = {
      asyncDispatch
    }
  }

  const actionWithAsyncDispatch = Object.assign({}, action, new_action);

  next(actionWithAsyncDispatch);
  syncActivityFinished = true;
  flushQueue();
};

export default asyncDispatchMiddleware;