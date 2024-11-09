FROM mirror.gcr.io/library/python:3.12
WORKDIR /app
COPY ./app/ /app
RUN pip install -r requirements.txt
EXPOSE 8000
CMD ["python", "main.py"]