const scriptElement = document.createElement('script');
scriptElement.type = 'text/javascript';
scriptElement.src = (document.currentScript as HTMLScriptElement).src.replace('app.js', 'pssocial-ui.js');
scriptElement.type = 'module';
document.head.append(scriptElement);
