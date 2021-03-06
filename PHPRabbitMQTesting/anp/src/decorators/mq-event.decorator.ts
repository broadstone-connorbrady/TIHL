import { RabbitSubscribe } from "@golevelup/nestjs-rabbitmq";

export function MQEvent (service: string, topic: string): any {
  const routingKey = service + '.event.' + topic;

  const queue = service + '-' +
    topic.replace('.', '-').toLowerCase() + '-queue';

  const fullQueueName = process.env.SERVICE_NAME ? 'ms.' + process.env.SERVICE_NAME + ';' + queue : queue;


  return RabbitSubscribe({
    exchange: 'orka.event',
    routingKey: routingKey,
    // queue: queue,
    queueOptions: {
      durable: true,
      autoDelete: true,
    }
  });
}




