#!/usr/bin/env python
# coding: utf-8

# In[2]:


get_ipython().system('pip install pytrends')


# In[4]:


import pandas as pd                        
from pytrends.request import TrendReq
pytrend = TrendReq()


# In[5]:


# Get Google Keyword Suggestions
keywords = pytrend.suggestions(keyword='Mukena')
df = pd.DataFrame(keywords)
df.drop(columns= 'mid')   # This column makes no sense


# In[ ]:




